<?php

namespace Tests\Unit\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;

class OwnerControllerTest extends AbstractResourceControllerTestBase
{
    const OWNER_COUNT = 10;

    protected function setUp(): void
    {
        parent::setUp();

        if (Owner::all()->isEmpty()) {
            Owner::factory(self::OWNER_COUNT)
                ->has(Car::factory(rand(0, 5)))
                ->create();
        }
    }

    public function test_index()
    {
        $response = $this->get(route('owner.index'))->assertOk();

        $owners = $response->json('data');

        $this->assertCount(self::OWNER_COUNT, $owners);
    }

    public function test_create()
    {
        $this->get(route('owner.create'))->assertOk();
    }

    public function test_store()
    {
        $testUser = [
            'forename' => 'Test',
            'surname' => 'User',
            'email' => 'test@email.com',
            'phone' => '0123456789',
        ];

        $this->assertDatabaseMissing('owners', $testUser);

        $this->assertCount(self::OWNER_COUNT, Owner::all());
        $this->post(route('owner.store'), $testUser)->assertOk();
        $this->assertCount(self::OWNER_COUNT + 1, Owner::all());
        $this->assertDatabaseHas('owners', $testUser);
    }

    public static function invalidUserDataProvider()
    {
        return [
            [
                [
                    'forename' => 'Test',
                    'surname' => 'User',
                    'email' => 'test',
                    'phone' => '0123456789',
                ],
                [
                    'email',
                ],
            ],
            [
                [
                    'forename' => '',
                    'surname' => 'User',
                    'email' => 'test',
                    'phone' => '0123456789',
                ],
                [
                    'forename', 'email',
                ],
            ],
        ];
    }

    /**
     * @dataProvider invalidUserDataProvider
     */
    public function test_store_with_validation_errors($testUser, $errors)
    {
        $this->post(route('owner.store'), $testUser)->assertInvalid($errors);

        $this->assertCount(self::OWNER_COUNT, Owner::all());
    }

    public function test_show()
    {
        $this->markTestIncomplete();
    }

    public function test_edit()
    {
        $this->markTestIncomplete();
    }

    public function test_update()
    {
        $testUser = [
            'forename' => 'Test',
            'surname' => 'User',
            'email' => 'test@email.com',
            'phone' => '0123456789',
        ];

        $owner = Owner::firstOrFail();

        $this->put(route('owner.update', $owner->id), $testUser)->assertOk();

        $owner->refresh();

        $this->assertEquals($testUser['forename'], $owner->forename);
        $this->assertEquals($testUser['surname'], $owner->surname);
        $this->assertEquals($testUser['email'], $owner->email);
        $this->assertEquals($testUser['phone'], $owner->phone);
    }

    public function test_destroy()
    {
        $owner = Owner::firstOrFail();

        $ownerCarIds = $owner->cars->pluck(['id']);

        $this->delete(route('owner.destroy', $owner->id))
            ->assertRedirect($uri = '/')
            ->assertSessionHas('owner_deleted', $owner->email);

        $this->assertNull(Owner::find($owner->id));

        foreach ($ownerCarIds as $carId) {
            $this->assertNull(Car::find($carId));
        }
    }
}
