<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\PostEvent;
use App\Models\PostNew;
use App\Models\SettingHome;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingHome::query()->first();
    }

    public function index()
    {
        if ($this->setting->num_display) {
            $postNews = PostNew::query()->where([
                'status' => Helper::$STATUS_ON
            ])
                ->orderBy('created_at', 'desc')
                ->paginate($this->setting->num_news_display)
                ->fragment('news');
        } else {
            $postNews = collect();
        }
        if ($this->setting->num_display) {
            $postEvents = PostEvent::query()
                ->where([
                    'status' => Helper::$STATUS_ON
                ])
                ->orderBy('created_at', 'desc')
                ->paginate($this->setting->num_events_display)
                ->fragment('events');
        } else {
            $postEvents = collect();
        }
        return view('home')
            ->with([
                'settingHome' => $this->setting,
                'postNews' => $postNews,
                'postEvents' => $postEvents,
            ]);
    }
}
