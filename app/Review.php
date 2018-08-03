<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'rating', 'comment', 'spam'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function scopeSpam($query)
    {
        return $query->where('spam', true);
    }

    public function scopeNotSpam($query)
    {
        return $query->where('spam', false);
    }

    public function storeReviewForProduct($productID, $comment, $rating)
    {
        $product = Product::find($productID);

        $this->comment = $comment;
        $this->rating = $rating;
        $product->reviews()->save($this);

        $product->recalculateRating();
    }

    public function getProductName($id)
    {
        $product = Product::find($id);
        $hasil = $product->product_name;
        return $hasil;
    }

    public function getReviewerName($id)
    {
        $user = User::find($id);
        $hasil = $user->name;
        return $hasil;
    }
}
