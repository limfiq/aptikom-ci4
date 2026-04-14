<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Rate Limiter Filter — Anti-DDoS / Brute Force
 * Batasi jumlah request per IP per window waktu menggunakan CI4 Cache.
 */
class RateLimiter implements FilterInterface
{
    /**
     * Maks request per window.
     * Ubah sesuai kebutuhan per route di Filters.php
     */
    protected int $maxRequests = 10;  // default: 10 request
    protected int $window      = 60;  // per 60 detik

    public function before(RequestInterface $request, $arguments = null)
    {
        // Override limit dari arguments jika diberikan: ['5', '30'] → 5 req / 30 detik
        if (!empty($arguments)) {
            $this->maxRequests = (int) ($arguments[0] ?? $this->maxRequests);
            $this->window      = (int) ($arguments[1] ?? $this->window);
        }

        $ip  = $request->getIPAddress();
        $uri = $request->getUri()->getPath();
        // Key unik per IP + endpoint
        $key = 'rl_' . md5($ip . '_' . $uri);

        $cache = \Config\Services::cache();
        $hits  = $cache->get($key) ?? 0;

        if ($hits >= $this->maxRequests) {
            return \Config\Services::response()
                ->setStatusCode(429, 'Too Many Requests')
                ->setHeader('Retry-After', (string) $this->window)
                ->setHeader('X-RateLimit-Limit', (string) $this->maxRequests)
                ->setHeader('X-RateLimit-Remaining', '0')
                ->setJSON([
                    'error'   => 'Terlalu banyak permintaan. Silakan coba lagi dalam ' . $this->window . ' detik.',
                    'status'  => 429,
                ]);
        }

        // Increment counter; jika belum ada, set TTL sesuai window
        if ($hits === 0) {
            $cache->save($key, 1, $this->window);
        } else {
            $cache->save($key, $hits + 1, $this->window);
        }

        return null; // lanjut ke controller
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tambahkan header info rate limit pada response
        $ip  = $request->getIPAddress();
        $uri = $request->getUri()->getPath();
        $key = 'rl_' . md5($ip . '_' . $uri);

        $maxRequests = (int) ($arguments[0] ?? $this->maxRequests);
        $hits        = \Config\Services::cache()->get($key) ?? 0;
        $remaining   = max(0, $maxRequests - $hits);

        $response->setHeader('X-RateLimit-Limit', (string) $maxRequests);
        $response->setHeader('X-RateLimit-Remaining', (string) $remaining);

        return $response;
    }
}
