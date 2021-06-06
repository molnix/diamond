<?php

namespace App;

use App\Service\fileServices;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'telephone', 'password', 'access_id', 'password_reset_token', 'email_verified_token', 'email_verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_reset_token', 'email_verified', 'email_verified_token', 'access_id',
    ];



    public function access(){
        return $this->belongsTo('App\Access','access_id','id');
    }
    public function worker_job(){
        return $this->hasMany('App\Job','worker_id','id');
    }
    public function client_job(){
        return $this->hasMany('App\Job','client_id','id');
    }
    public function chats(){
        return $this->hasMany('App\Chat');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function(User $user) {
            $fileService = app(fileServices::class);

            foreach ($user->client_job as $job) {
                $fileService->deleteFile([$job->image_before, $job->image_after]);
            }
            $user->client_job()->delete();
            $user->worker_job()->delete();

            $user->chats()->delete();
        });
    }
}
