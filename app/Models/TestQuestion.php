<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_questions';

    protected $fillable = ['body'];

    public $timestamps = false;

    /**
     * Return test for those belogs question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qTest(){
        return $this->belongsTo(Test::class);
    }

    /**
     * Return all answers for this question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(){
        return $this->hasMany(TestQuestionAnswer::class);
    }
}
