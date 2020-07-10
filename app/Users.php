<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Users
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Users whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Users extends Model
{
    protected $table = 'users';
}
