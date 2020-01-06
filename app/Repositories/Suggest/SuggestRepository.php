<?php
namespace App\Repositories\Suggest;

use App\Repositories\EloquentRepository;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SuggestRepository extends EloquentRepository implements SuggestRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return \App\Models\Suggest::class;
    }

    public function getQuantitySuggest()
    {
        return DB::table('suggests')
            ->where('status','=', 'Waiting')
            ->count('*');
    }
}
