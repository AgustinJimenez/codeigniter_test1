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
        'updated_at'
    ];
    
    public function getLastLoginAttribute()
    {
        return $this->attributes['last_login']?Carbon\Carbon::CreateFromFormat( 'Y-m-d H:i:s', $this->attributes['last_login'] ):null;

    }

    public function setPasswdAttribute($value)
    {
        $this->attributes['passwd'] = $this->hash_passwd($value);
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

    public function hash_passwd( $password, $random_salt = '' )
	{
		// If no salt provided for older PHP versions, make one
		if( ! is_php('5.5') && empty( $random_salt ) )
			$random_salt = $this->random_salt();

		// PHP 5.5+ uses new password hashing function
		if( is_php('5.5') ){
			return password_hash( $password, PASSWORD_BCRYPT, ['cost' => 11] );
		}

		// PHP < 5.5 uses crypt
		else
		{
			return crypt( $password, '$2y$10$' . $random_salt );
		}
	}

}