<?php

namespace App\Http\Middleware;

use App\Models\RequestResponseLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LogRequestsAndResponses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        RequestResponseLog::create([
            'session_id' => $request->session()->getId(),
            'user_ip' => $request->getClientIp(),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'request_parameters' => json_encode($this->maskPassword($request->all())),
            'status_code' => $response->status(),
            'response_content' => $response->getContent(),
        ]);

        return $response;
    }

    private function maskPassword($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->maskPassword($value);
            }

            if (array_key_exists('password', $data)) {
                $data['password'] = preg_replace('/[a-zA-Z]/', '*', $data['password']);
            }
        }

        return $data;
    }
}
