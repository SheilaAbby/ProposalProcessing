<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Proposal;
use App\User;

class ExampleTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * @test
     *
     * @group current
     */
    public function can_create_proposal()
    {
    	$user = factory(User::class)->create();
    	$proposals = $user->proposals()->saveMany(factory(Proposal::class, 10)->make());
    	$submitted = $proposals->random(6)->each(function($proposal){
    		$proposal->submitted_at = now();
    		$proposal->save();
    	});
    	$drafts = Proposal::whereNotIn('id', $submitted->pluck('id')->toArray())->get();

    	$this->assertTrue($drafts->count() == Proposal::query()->whereDraft()->get()->count());
    }
}
