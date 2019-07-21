<?php

namespace Tests\Feature;

use App\Appointment;
use App\Availability;
use App\Customer;
use App\Treatment;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function testHomeRouteShowsTreatments(): void
    {
        factory(Treatment::class)->create([
            'id' => $expectSeeId = $this->faker()->unique()->randomNumber(),
            'title' => $expectSeeTitle = $this->faker()->sentence,
        ]);

        $response = $this->get('/');
        $response->assertSee('value="'.$expectSeeId.'"');
        $response->assertSee($expectSeeTitle);
    }

    public function testHomeRouteShowsAvailabilities(): void
    {
        factory(Availability::class)->create([
            'id' => $expectSeeId = $this->faker()->unique()->randomNumber(),
            'dateTime' => $expectSeeDateTime = "{$this->faker()->date} {$this->faker()->time()}",
        ]);

        $response = $this->get('/');
        $response->assertSee('value="'.$expectSeeId.'"');
        $response->assertSee($expectSeeDateTime);
    }

    /**
     * @dataProvider requiredParamsDataProvider
     * @param string $param
     */
    public function testBookPostRequestValidatesRequiredParams(string $param): void
    {
        $this->post('/')->assertSessionHasErrors($param);
    }

    public function requiredParamsDataProvider(): array
    {
        return [
            ['firstName',],
            ['lastName',],
            ['emailAddress',],
            ['phoneNumber',],
            ['availability',],
            ['treatment',],
        ];
    }

    /**
     * @dataProvider validateEmailAddressDataProvider
     * @param string $email
     * @param string $assertion
     */
    public function testBookPostRequestValidatesEmailAddress(string $email, string $assertion): void
    {
        $this->post('/', [
            'firstName' => $this->faker()->firstName,
            'lastName' => $this->faker()->lastName,
            $key = 'emailAddress' => $email,
            'phoneNumber' => $this->faker()->phoneNumber,
            'availability' => $this->faker()->randomNumber,
            'treatment' => $this->faker()->randomNumber,
        ])->$assertion($key);
    }

    public function validateEmailAddressDataProvider(): array
    {
        return [
            ['foo', 'assertSessionHasErrors',],
            ['foo@bar', 'assertSessionHasNoErrors',],
            ['foo@bar.baz', 'assertSessionHasNoErrors',],
            ['foo@bar.baz.qux', 'assertSessionHasNoErrors',],
        ];
    }

    /**
     * @dataProvider validatesNumericDataProvider
     * @param array $numericRow
     * @param string $assertion
     */
    public function testBookPostRequestValidatesNumeric(array $numericRow, string $assertion): void
    {
        $this->post('/', array_merge([
            'firstName' => $this->faker()->firstName,
            'lastName' => $this->faker()->lastName,
            'emailAddress' => $this->faker()->email,
            'phoneNumber' => $this->faker()->phoneNumber,
            'availability' => $this->faker()->randomNumber,
            'treatment' => $this->faker()->randomNumber,
        ], $numericRow))->$assertion(key($numericRow));
    }

    public function validatesNumericDataProvider(): array
    {
        return [
            [['availability' => $key = 'foo',], 'assertSessionHasErrors',],
            [['treatment' => $key,], 'assertSessionHasErrors',],
            [['foo' => $key,], 'assertSessionHasNoErrors',],
        ];
    }

    public function testValidatedBookPostRequestCreatesCustomer(): void
    {
        $request = $this->post('/', $expected = [
            'firstName' => $this->faker()->firstName,
            'lastName' => $this->faker()->lastName,
            'emailAddress' => $this->faker()->email,
            'phoneNumber' => $this->faker()->phoneNumber,
            'availability' => ($availability = factory(Availability::class)->create([
                'dateTime' => $date = Carbon::tomorrow(),
            ]))->id,
            'treatment' => factory(Treatment::class)->create()->id,
        ]);

        $customerKeys = [
            'firstName',
            'lastName',
            'emailAddress',
        ];

        $this->assertDatabaseHas(($customer = new Customer)->getTable(), array_filter($expected, static function($key) use($customerKeys) {
            return in_array($key, $customerKeys, true);
        }));

        $this->assertDatabaseHas((new Appointment())->getTable(), [
            'availability_id' => $expected['availability'],
            'customer_id' => $customer->first()->id,
            'treatment_id' => $expected['treatment'],
            'dateTimeStart' => $date->toDateTimeString(),
            'dateTimeEnd' => $date->addMinutes(Availability::DURATION_MINUTES)->toDateTimeString(),
        ]);

        $this->assertNotNull($availability->fresh()->deleted_at);

        $request->assertSessionHas('success.reservation');
    }

}
