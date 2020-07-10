<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PostComment
 *
 * @property int $id
 * @property int $user_id users table ref.
 * @property int $post_id post table ref.
 * @property string $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostComment whereUserId($value)
 * @mixin \Eloquent
 */
class PostComment extends Model
{
    protected $table = 'post_comment';

    public function user()
    {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }
}
