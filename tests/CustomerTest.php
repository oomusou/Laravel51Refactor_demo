<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use VideoRental\Customer;
use VideoRental\Movie;
use VideoRental\Order;

class CustomerTest extends TestCase
{
    /**
     * @group Sam
     * @group CustomerTest
     */
    public function test_order_1_regular_movie_with_10_days()
    {
        /** arrange */
        $movie = new Movie('Regular');
        $order = new Order($movie, 10);
        $target = new Customer();
        $target->addOrder($order);

        $expected = 130;

        /** act */
        $actual = $target->calculateTotalPrice();

        /** assert */
        $this->assertEquals($expected, $actual);
    }

    /**
     * @group Sam
     * @group CustomerTest
     */
    public function test_order_1_new_release_movie_with_5_days()
    {
        /** arrange */
        $movie = new Movie('NewRelease');
        $order = new Order($movie, 5);
        $target = new Customer();
        $target->addOrder($order);

        $expected = 210;

        /** act */
        $actual = $target->calculateTotalPrice();

        /** assert */
        $this->assertEquals($expected, $actual);
    }
}