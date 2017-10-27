<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH.'models/BaseModel.php';

class User extends BaseModel
{
    protected $table = 'users';
    protected $guarded = ['user_id'];
    public $timestamps  = false;
    protected $fillable = 
    [
        'user_id',
        'username', 
        'email',
        'auth_level', 
        'banned', 
        'passwd', 
        'passwd_recovery_code',
        'passwd_recovery_date', 
        'passwd_modified_at', 
        'last_login',
        'created_at',
        'modified_at'
    ];
    
    public function getLastLoginAttribute()
    {
        return Carbon\Carbon::CreateFromFormat( 'Y-m-d H:i:s', $this->attributes['last_login'] );
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = date('Y-m-d');
    }

    public function getAuthLevelAttribute()
    {
        return ($this->attributes['auth_level'] == '1')?'customer':
                ($this->attributes['auth_level'] == '6')?'manager':
                ($this->attributes['auth_level'] == '9')?'admin':'auth level not seted';
    }

    public function getEditButtonAttribute()
    {
        $edit_link = 'users/' . $this->attributes["auth_level"] . '/edit';

        return '<a href="' . $edit_link . '" class="btn btn-flat btn-primary">
                    <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                </a>';
    }

    public function getGetAllAuthsLevelsAttribute()
    {
        return ['9' => 'admin', '6' => 'manager', '1' => 'customer'];
    }

}