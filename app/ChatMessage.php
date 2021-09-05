<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatMessage extends Model
{
    use HasFactory;

    /**
     * 文字列のリンク部分に<a>タグを埋め込む
     * @return string
     */

    public function getBodyWithLinkAttribute() : string
    {
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';
        return preg_replace($pattern, $replace, $this->body);
    }
}
