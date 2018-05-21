<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewConcertListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_view_a_published_concert_listing()
    {
        $concert = factory('App\Concert')->states('published')->create();

        $this->get('/concerts/' . $concert->id)
            ->assertSee($concert->title)
            ->assertSee($concert->subtitle)
            ->assertSee($concert->formatted_date)
            ->assertSee($concert->formatted_start_time)
            ->assertSee($concert->ticket_price_in_dollars)
            ->assertSee($concert->venue)
            ->assertSee($concert->venue_address)
            ->assertSee($concert->city)
            ->assertSee($concert->state)
            ->assertSee($concert->zip)
            ->assertSee($concert->additional_information);
    }

    /** @test */
    function a_user_cannot_view_an_unpublished_concert_listings()
    {
        $concert = factory('App\Concert')->states('unpublished')->create();

        $this->get("/concerts/{$concert->id}")->assertStatus(404);
    }
}
