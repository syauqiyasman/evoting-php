<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\DashboardFilter;
use App\Filters\VotedVoterFilter;
use App\Filters\VoteFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'dashboard' => DashboardFilter::class,
        'vote' => VoteFilter::class,
        'voted' => VotedVoterFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'dashboard' => [
            'before' => ['dashboard', 'dashboard/*', 'candidatescontroller', 'candidatescontroller/*', 'voterscontroller', 'voterscontroller/*'],
            'after' => ['/', '/admin'],
        ],
        'vote' => [
            'before' => ['vote', 'vote/*', 'application/vote', 'application/vote/*', 'application/votePost', 'application/votePost/*',],
            'after' => ['/', 'admin', 'admin/*'],
        ],
        'voted' => [
            'before' => ['response', 'response/*', 'application/response', 'application/response/*'],
            'after' => ['/', 'admin', 'admin/*'],
        ]

    ];
}
