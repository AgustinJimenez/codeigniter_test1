<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH.'models/BaseModel.php';

class User extends BaseModel
{
    protected $table = 'users';
    protected $guarded = ['id'];
    public $timestamps  = false;
    protected $fillable = 
    [
        'username',
        'password', 
        'email',
        'first_name',
        'last_name',
        'company',
        'phone',
        'active'
    ];
/*  
    public function getLastLoginAttribute()
    {
        return $this->attributes['last_login']?Carbon\Carbon::CreateFromFormat( 'Y-m-d H:i:s', $this->attributes['last_login'] ):null;

    }
*/
    public function setPasswordAttribute($value)
    {
        $this->attributes['passwd'] = $this->hash_passwd($value);
    }
    
    public function getEditButtonAttribute()
    {
        $edit_link = 'backend/users/' . $this->attributes["user_id"] . '/edit';

        return '<a href="' . $edit_link . '" class="btn btn-flat btn-primary">
                    <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                </a>';
    }

    public function hash_passwd( $password, $random_salt = '' )
	{
		// If no salt provided for older PHP versions, make one
		if( ! is_php('5.5') && empty( $random_salt ) )
			$random_salt = $this->random_salt();
		// PHP 5.5+ uses new password hashing function
		if( is_php('5.5') )
			return password_hash( $password, PASSWORD_BCRYPT, ['cost' => 11] );
		// PHP < 5.5 uses crypt
		else
			return crypt( $password, '$2y$10$' . $random_salt );
	}

}