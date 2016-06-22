<?php

namespace Facemash;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'username',
        'location',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function getName()
    {
        if ($this->name) {

            return $this->name;
        }

        return null;
    }

    public function getAvatar()
    {
        return"https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm";
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function friendsOfMine()
    {
        // select friends from users where user_id = User model id
        return $this->belongsToMany('Facemash\User','friends','user_id','friend_id');
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function friendsOf()
    {

    // select users from users where friend_id = User model id
    //     
     return $this->belongsToMany('Facemash\User','friends','friend_id','user_id');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted',true )->get()
                    ->merge($this->friendsOf()->wherePivot('accepted',true )->get());
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted',false )->get();

    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function friendRequestsPending()
    {
                
        return $this->friendsOf()->wherePivot('accepted',false )->get();

    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function HasFriendRequestsPending(User $user)
    {
        // the id here is refer to users table id NOT the friends table id        
        return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function HasFriendRequestsRecieved(User $user)
    {
                
        return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addFriend(User $user)
    {        
        return $this->friendsOf()->attach($user->id );
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function acceptFriendRequest(User $user)
    {
                
        return $this->friendRequests()->where('id',$user->id)->first()->pivot->update(['accepted'=>true,]);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function isFriendWith(User $user)
    {
                
        return (bool) $this->friends()->where('id',$user->id)->count();
    }



}
