<?php

declare(strict_types=1);

namespace Rinvex\Country\Tests\Unit;

use Rinvex\Country\Country;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HelpersTest extends TestCase
{
    #[Test]
    public function it_returns_country_data(): void
    {
        $egypt = [
            'name' => [
                'common' => 'Egypt',
                'official' => 'Arab Republic of Egypt',
                'native' => [
                    'ara' => [
                        'common' => 'مصر',
                        'official' => 'جمهورية مصر العربية',
                    ],
                ],
            ],
            'demonym' => 'Egyptian',
            'capital' => 'Cairo',
            'iso_3166_1_alpha2' => 'EG',
            'iso_3166_1_alpha3' => 'EGY',
            'iso_3166_1_numeric' => '818',
            'currency' => [
                'EGP' => [
                    'iso_4217_code' => 'EGP',
                    'iso_4217_numeric' => 818,
                    'iso_4217_name' => 'Egyptian Pound',
                    'iso_4217_minor_unit' => 2,
                ],
            ],
            'tld' => [
                '.eg',
                '.مصر',
            ],
            'alt_spellings' => [
                'EG',
                'Arab Republic of Egypt',
            ],
            'languages' => [
                'ara' => 'Arabic',
            ],
            'geo' => [
                'continent' => [
                    'AF' => 'Africa',
                ],
                'postal_code' => true,
                'latitude' => '27 00 N',
                'latitude_desc' => '26.756103515625',
                'longitude' => '30 00 E',
                'longitude_desc' => '29.86229705810547',
                'max_latitude' => '31.916667',
                'max_longitude' => '36.333333',
                'min_latitude' => '20.383333',
                'min_longitude' => '24.7',
                'area' => 1002450,
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'world_region' => 'EMEA',
                'region_code' => '002',
                'subregion_code' => '015',
                'landlocked' => false,
                'borders' => [
                    'ISR',
                    'LBY',
                    'SDN',
                ],
                'independent' => 'Yes',
            ],
            'dialling' => [
                'calling_code' => [
                    '20',
                ],
                'national_prefix' => '0',
                'national_number_lengths' => [
                    9,
                ],
                'national_destination_code_lengths' => [
                    2,
                ],
                'international_prefix' => '00',
            ],
            'extra' => [
                'geonameid' => 357994,
                'edgar' => 'H2',
                'itu' => 'EGY',
                'marc' => 'ua',
                'wmo' => 'EG',
                'ds' => 'ET',
                'fifa' => 'EGY',
                'fips' => 'EG',
                'gaul' => 40765,
                'ioc' => 'EGY',
                'cowc' => 'EGY',
                'cown' => 651,
                'fao' => 59,
                'imf' => 469,
                'ar5' => 'MAF',
                'address_format' => "{{recipient}}\n{{street}}\n{{postalcode}} {{city}}\n{{country}}",
                'eu_member' => null,
                'data_protection' => 'Other',
                'vat_rates' => null,
                'emoji' => '🇪🇬',
            ],
        ];

        $this->assertEquals($egypt, country('eg', false));
        $this->assertEquals(new Country($egypt), country('eg'));
    }

    #[Test]
    public function it_returns_country_array_shortlist(): void
    {
        $this->assertEquals(250, count(countries()));
        $this->assertIsArray(countries()['eg']);
        $this->assertEquals('Egypt', countries()['eg']['name']);
        $this->assertArrayNotHasKey('geo', countries()['eg']);
    }

    #[Test]
    public function it_returns_courrencies_longlist(): void
    {
        $this->assertEquals(165, count(currencies(true)));
        $this->assertArrayHasKey('EGP', currencies());
        $this->assertIsArray(currencies(true)['EGP']);
        $this->assertEquals('EGP', currencies(true)['EGP']['iso_4217_code']);
        $this->assertEquals('818', currencies(true)['EGP']['iso_4217_numeric']);
        $this->assertEquals('Egyptian Pound', currencies(true)['EGP']['iso_4217_name']);
        $this->assertEquals('2', currencies(true)['EGP']['iso_4217_minor_unit']);
    }

    #[Test]
    public function it_returns_courrencies_shortlist(): void
    {
        $this->assertEquals(165, count(currencies()));
        $this->assertArrayHasKey('EGP', currencies());
        $this->assertIsString(currencies()['EGP']);
        $this->assertEquals('EGP', currencies()['EGP']);
    }
}
