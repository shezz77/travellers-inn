<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    private $model;

    /**
     * CategoryTableSeeder constructor.
     * @param $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $this->model->truncate();

        $this->model->create(array(
            'id' => '1',
            'title' => 'Content',
            'genre' => 'Post content',
            'detail' => 'Post',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '2',
            'parent_id' => '1',
            'title' => 'Tip',
            'genre' => 'Tip content',
            'detail' => 'Tip Post',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '3',
            'parent_id' => '1',
            'title' => 'Image',
            'genre' => 'Image content',
            'detail' => 'Image Post',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '4',
            'parent_id' => '1',
            'title' => 'Video',
            'genre' => 'Video content',
            'detail' => 'Video Post',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '5',
            'parent_id' => '1',
            'title' => 'Diary',
            'genre' => 'Diary content',
            'detail' => 'Diary Post',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '6',
            'parent_id' => '1',
            'title' => 'Ebook',
            'genre' => 'Ebook content',
            'detail' => 'Ebook Post',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '7',
            'title' => 'Continent',
            'genre' => 'Continent',
            'detail' => 'Continent',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '8',
            'parent_id' => '7',
            'title' => 'Asia',
            'genre' => 'Asia',
            'detail' => 'Asia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '9',
            'parent_id' => '7',
            'title' => 'North America',
            'genre' => 'North America',
            'detail' => 'North America',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '10',
            'parent_id' => '7',
            'title' => 'South America',
            'genre' => 'South America',
            'detail' => 'South America',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '11',
            'parent_id' => '7',
            'title' => 'Oceania',
            'genre' => 'Oceania',
            'detail' => 'Oceania',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '12',
            'parent_id' => '7',
            'title' => 'Europe',
            'genre' => 'Europe',
            'detail' => 'Europe',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '13',
            'parent_id' => '7',
            'title' => 'Africa',
            'genre' => 'Africa',
            'detail' => 'Africa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '14',
            'parent_id' => '8',
            'title' => 'Afghanistan',
            'genre' => 'Afghanistan',
            'detail' => 'Afghanistan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '15',
            'parent_id' => '8',
            'title' => 'Armenia',
            'genre' => 'Armenia',
            'detail' => 'Armenia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '16',
            'parent_id' => '8',
            'title' => 'Azerbaijan',
            'genre' => 'Azerbaijan',
            'detail' => 'Azerbaijan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '17',
            'parent_id' => '8',
            'title' => 'Bahrain',
            'genre' => 'Bahrain',
            'detail' => 'Bahrain',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '18',
            'parent_id' => '8',
            'title' => 'Bangladesh',
            'genre' => 'Bangladesh',
            'detail' => 'Bangladesh',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '19',
            'parent_id' => '8',
            'title' => 'Bhutan',
            'genre' => 'Bhutan',
            'detail' => 'Bhutan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '20',
            'parent_id' => '8',
            'title' => 'Brunei',
            'genre' => 'Brunei',
            'detail' => 'Brunei',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '21',
            'parent_id' => '8',
            'title' => 'Cambodia',
            'genre' => 'Cambodia',
            'detail' => 'Cambodia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '22',
            'parent_id' => '8',
            'title' => 'China',
            'genre' => 'China',
            'detail' => 'China',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '23',
            'parent_id' => '8',
            'title' => 'East Timor',
            'genre' => 'East Timor',
            'detail' => 'East Timor',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '24',
            'parent_id' => '8',
            'title' => 'Georgia',
            'genre' => 'Georgia',
            'detail' => 'Georgia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '25',
            'parent_id' => '8',
            'title' => 'India',
            'genre' => 'India',
            'detail' => 'India',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '26',
            'parent_id' => '8',
            'title' => 'Indonesia',
            'genre' => 'Indonesia',
            'detail' => 'Indonesia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '27',
            'parent_id' => '8',
            'title' => 'Iran',
            'genre' => 'Iran',
            'detail' => 'Iran',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '28',
            'parent_id' => '8',
            'title' => 'Iraq',
            'genre' => 'Iraq',
            'detail' => 'Iraq',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '29',
            'parent_id' => '8',
            'title' => 'Israel',
            'genre' => 'Israel',
            'detail' => 'Israel',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '30',
            'parent_id' => '8',
            'title' => 'Japan',
            'genre' => 'Japan',
            'detail' => 'Japan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '31',
            'parent_id' => '8',
            'title' => 'Jordan',
            'genre' => 'Jordan',
            'detail' => 'Jordan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '32',
            'parent_id' => '8',
            'title' => 'Kazakhstan',
            'genre' => 'Kazakhstan',
            'detail' => 'Kazakhstan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '33',
            'parent_id' => '8',
            'title' => 'Kuwait',
            'genre' => 'Kuwait',
            'detail' => 'Kuwait',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '34',
            'parent_id' => '8',
            'title' => 'Kyrgyzstan',
            'genre' => 'Kyrgyzstan',
            'detail' => 'Kyrgyzstan',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '35',
            'parent_id' => '8',
            'title' => 'Laos',
            'genre' => 'Laos',
            'detail' => 'Laos',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '36',
            'parent_id' => '8',
            'title' => 'Lebanon',
            'genre' => 'Lebanon',
            'detail' => 'Lebanon',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '37',
            'parent_id' => '8',
            'title' => 'Malaysia',
            'genre' => 'Malaysia',
            'detail' => 'Malaysia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '38',
            'parent_id' => '8',
            'title' => 'Maldives',
            'genre' => 'Maldives',
            'detail' => 'Maldives',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '39',
            'parent_id' => '8',
            'title' => 'Mongolia',
            'genre' => 'Mongolia',
            'detail' => 'Mongolia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '40',
            'parent_id' => '8',
            'title' => 'Myanmar',
            'genre' => 'Myanmar',
            'detail' => 'Myanmar',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '41',
            'parent_id' => '8',
            'title' => 'Nepal',
            'genre' => 'Nepal',
            'detail' => 'Nepal',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '42',
            'parent_id' => '8',
            'title' => 'North Korea',
            'genre' => 'North Korea',
            'detail' => 'North Korea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '43',
            'parent_id' => '8',
            'title' => 'Oman',
            'genre' => 'Oman',
            'detail' => 'Oman',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '44',
            'parent_id' => '8',
            'title' => 'Pakistan',
            'genre' => 'Pakistan',
            'detail' => 'Pakistan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '45',
            'parent_id' => '8',
            'title' => 'Palestinian territories',
            'genre' => 'Palestinian territories',
            'detail' => 'Palestinian territories',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '46',
            'parent_id' => '8',
            'title' => 'Philippines',
            'genre' => 'Philippines',
            'detail' => 'Philippines',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '47',
            'parent_id' => '8',
            'title' => 'Qatar',
            'genre' => 'Qatar',
            'detail' => 'Qatar',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '48',
            'parent_id' => '8',
            'title' => 'Saudi Arabia',
            'genre' => 'Saudi Arabia',
            'detail' => 'Saudi Arabia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '49',
            'parent_id' => '8',
            'title' => 'Singapore',
            'genre' => 'Singapore',
            'detail' => 'Singapore',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '50',
            'parent_id' => '8',
            'title' => 'South Korea',
            'genre' => 'South Korea',
            'detail' => 'South Korea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '51',
            'parent_id' => '8',
            'title' => 'Sri Lanka',
            'genre' => 'Sri Lanka',
            'detail' => 'Sri Lanka',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '52',
            'parent_id' => '8',
            'title' => 'Syria',
            'genre' => 'Syria',
            'detail' => 'Syria',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '53',
            'parent_id' => '8',
            'title' => 'Taiwan',
            'genre' => 'Taiwan',
            'detail' => 'Taiwan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '54',
            'parent_id' => '8',
            'title' => 'Tajikistan',
            'genre' => 'Tajikistan',
            'detail' => 'Tajikistan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '55',
            'parent_id' => '8',
            'title' => 'Thailand',
            'genre' => 'Thailand',
            'detail' => 'Thailand',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '56',
            'parent_id' => '8',
            'title' => 'Turkey',
            'genre' => 'Turkey',
            'detail' => 'Turkey',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '57',
            'parent_id' => '8',
            'title' => 'Turkmenistan',
            'genre' => 'Turkmenistan',
            'detail' => 'Turkmenistan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '58',
            'parent_id' => '8',
            'title' => 'United Arab Emirates',
            'genre' => 'United Arab Emirates',
            'detail' => 'United Arab Emirates',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '59',
            'parent_id' => '8',
            'title' => 'Uzbekistan',
            'genre' => 'Uzbekistan',
            'detail' => 'Uzbekistan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '60',
            'parent_id' => '8',
            'title' => 'Vietnam',
            'genre' => 'Vietnam',
            'detail' => 'Vietnam',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '61',
            'parent_id' => '8',
            'title' => 'Yemen',
            'genre' => 'Yemen',
            'detail' => 'Yemen',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '62',
            'parent_id' => '9',
            'title' => 'Anguilla',
            'genre' => 'Anguilla',
            'detail' => 'Anguilla',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '63',
            'parent_id' => '9',
            'title' => 'Antigua and Barbuda',
            'genre' => 'Antigua and Barbuda',
            'detail' => 'Antigua and Barbuda',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '64',
            'parent_id' => '9',
            'title' => 'Aruba',
            'genre' => 'Aruba',
            'detail' => 'Aruba',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '65',
            'parent_id' => '9',
            'title' => 'Bahamas',
            'genre' => 'Bahamas',
            'detail' => 'Bahamas',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '66',
            'parent_id' => '9',
            'title' => 'Barbados',
            'genre' => 'Barbados',
            'detail' => 'Barbados',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '67',
            'parent_id' => '9',
            'title' => 'Belize',
            'genre' => 'Belize',
            'detail' => 'Belize',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '68',
            'parent_id' => '9',
            'title' => 'Bermuda',
            'genre' => 'Bermuda',
            'detail' => 'Bermuda',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '69',
            'parent_id' => '9',
            'title' => 'British Virgin Islands',
            'genre' => 'British Virgin Islands',
            'detail' => 'British Virgin Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '70',
            'parent_id' => '9',
            'title' => 'Canada',
            'genre' => 'Canada',
            'detail' => 'Canada',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '71',
            'parent_id' => '9',
            'title' => 'Cayman Islands',
            'genre' => 'Cayman Islands',
            'detail' => 'Cayman Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '72',
            'parent_id' => '9',
            'title' => 'Costa Rica',
            'genre' => 'Costa Rica',
            'detail' => 'Costa Rica',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '73',
            'parent_id' => '9',
            'title' => 'Cuba',
            'genre' => 'Cuba',
            'detail' => 'Cuba',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '74',
            'parent_id' => '9',
            'title' => 'Dominica',
            'genre' => 'Dominica',
            'detail' => 'Dominica',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '75',
            'parent_id' => '9',
            'title' => 'Dominican Republic',
            'genre' => 'Dominican Republic',
            'detail' => 'Dominican Republic',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '76',
            'parent_id' => '9',
            'title' => 'El Salvador',
            'genre' => 'El Salvador',
            'detail' => 'El Salvador',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '77',
            'parent_id' => '9',
            'title' => 'Greenland',
            'genre' => 'Greenland',
            'detail' => 'Greenland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '78',
            'parent_id' => '9',
            'title' => 'Grenada',
            'genre' => 'Grenada',
            'detail' => 'Grenada',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '79',
            'parent_id' => '9',
            'title' => 'Guadeloupe',
            'genre' => 'Guadeloupe',
            'detail' => 'Guadeloupe',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '80',
            'parent_id' => '9',
            'title' => 'Guatemala',
            'genre' => 'Guatemala',
            'detail' => 'Guatemala',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '81',
            'parent_id' => '9',
            'title' => 'Haiti',
            'genre' => 'Haiti',
            'detail' => 'Haiti',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '82',
            'parent_id' => '9',
            'title' => 'Honduras',
            'genre' => 'Honduras',
            'detail' => 'Honduras',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '83',
            'parent_id' => '9',
            'title' => 'Jamaica',
            'genre' => 'Jamaica',
            'detail' => 'Jamaica',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '84',
            'parent_id' => '9',
            'title' => 'Martinique',
            'genre' => 'Martinique',
            'detail' => 'Martinique',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '85',
            'parent_id' => '9',
            'title' => 'Mexico',
            'genre' => 'Mexico',
            'detail' => 'Mexico',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '86',
            'parent_id' => '9',
            'title' => 'Montserrat',
            'genre' => 'Montserrat',
            'detail' => 'Montserrat',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '87',
            'parent_id' => '9',
            'title' => 'Netherlands Antilles',
            'genre' => 'Netherlands Antilles',
            'detail' => 'Netherlands Antilles',
            'url' => '',
        ));
        $this->model->create(array(
        'id' => '88',
        'parent_id' => '9',
        'title' => 'Nicaragua',
        'genre' => 'Nicaragua',
        'detail' => 'Nicaragua',
        'url' => '',
    ));
        $this->model->create(array(
            'id' => '89',
            'parent_id' => '9',
            'title' => 'Panama',
            'genre' => 'Panama',
            'detail' => 'Panama',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '90',
            'parent_id' => '9',
            'title' => 'Puerto Rico',
            'genre' => 'Puerto Rico',
            'detail' => 'Puerto Rico',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '91',
            'parent_id' => '9',
            'title' => 'Saint Barthélemy',
            'genre' => 'Saint Barthélemy',
            'detail' => 'Saint Barthélemy',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '92',
            'parent_id' => '9',
            'title' => 'Saint Kitts and Nevis',
            'genre' => 'Saint Kitts and Nevis',
            'detail' => 'Saint Kitts and Nevis',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '93',
            'parent_id' => '9',
            'title' => 'Saint Lucia',
            'genre' => 'Saint Lucia',
            'detail' => 'Saint Lucia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '94',
            'parent_id' => '9',
            'title' => 'Collectivity of Saint Martin',
            'genre' => 'Collectivity of Saint Martin',
            'detail' => 'Collectivity of Saint Martin',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '95',
            'parent_id' => '9',
            'title' => 'Saint Pierre and Miquelon',
            'genre' => 'Saint Pierre and Miquelon',
            'detail' => 'Saint Pierre and Miquelon',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '96',
            'parent_id' => '9',
            'title' => 'Saint Vincent and the Grenadines',
            'genre' => 'Saint Vincent and the Grenadines',
            'detail' => 'Saint Vincent and the Grenadines',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '97',
            'parent_id' => '9',
            'title' => 'Trinidad and Tobago',
            'genre' => 'Trinidad and Tobago',
            'detail' => 'Trinidad and Tobago',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '98',
            'parent_id' => '9',
            'title' => 'Turks and Caicos Islands',
            'genre' => 'Turks and Caicos Islands',
            'detail' => 'Turks and Caicos Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '99',
            'parent_id' => '9',
            'title' => 'United States of America',
            'genre' => 'United States of America',
            'detail' => 'United States of America',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '100',
            'parent_id' => '9',
            'title' => 'United States Virgin Islands',
            'genre' => 'United States Virgin Islands',
            'detail' => 'United States Virgin Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '101',
            'parent_id' => '10',
            'title' => 'Argentina',
            'genre' => 'Argentina',
            'detail' => 'Argentina',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '102',
            'parent_id' => '10',
            'title' => 'Bolivia',
            'genre' => 'Bolivia',
            'detail' => 'Bolivia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '103',
            'parent_id' => '10',
            'title' => 'Brazil',
            'genre' => 'Brazil',
            'detail' => 'Brazil',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '104',
            'parent_id' => '10',
            'title' => 'Chile',
            'genre' => 'Chile',
            'detail' => 'Chile',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '105',
            'parent_id' => '10',
            'title' => 'Colombia',
            'genre' => 'Colombia',
            'detail' => 'Colombia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '106',
            'parent_id' => '10',
            'title' => 'Ecuador',
            'genre' => 'Ecuador',
            'detail' => 'Ecuador',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '107',
            'parent_id' => '10',
            'title' => 'Guyana',
            'genre' => 'Guyana',
            'detail' => 'Guyana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '108',
            'parent_id' => '10',
            'title' => 'Paraguay',
            'genre' => 'Paraguay',
            'detail' => 'Paraguay',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '109',
            'parent_id' => '10',
            'title' => 'Peru',
            'genre' => 'Peru',
            'detail' => 'Peru',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '110',
            'parent_id' => '10',
            'title' => 'Suriname',
            'genre' => 'Suriname',
            'detail' => 'Suriname',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '111',
            'parent_id' => '10',
            'title' => 'Uruguay',
            'genre' => 'Uruguay',
            'detail' => 'Uruguay',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '112',
            'parent_id' => '10',
            'title' => 'Venezuela',
            'genre' => 'Venezuela',
            'detail' => 'Venezuela',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '113',
            'parent_id' => '11',
            'title' => 'Australia',
            'genre' => 'Australia',
            'detail' => 'Australia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '114',
            'parent_id' => '11',
            'title' => 'Fiji',
            'genre' => 'Fiji',
            'detail' => 'Fiji',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '115',
            'parent_id' => '11',
            'title' => 'Kiribati',
            'genre' => 'Kiribati',
            'detail' => 'Kiribati',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '116',
            'parent_id' => '11',
            'title' => 'Marshall Islands',
            'genre' => 'Marshall Islands',
            'detail' => 'Marshall Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '117',
            'parent_id' => '11',
            'title' => 'Micronesia',
            'genre' => 'Micronesia',
            'detail' => 'Micronesia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '118',
            'parent_id' => '11',
            'title' => 'Nauru',
            'genre' => 'Nauru',
            'detail' => 'Nauru',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '119',
            'parent_id' => '11',
            'title' => 'New Zealand',
            'genre' => 'New Zealand',
            'detail' => 'New Zealand',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '120',
            'parent_id' => '11',
            'title' => 'Palau',
            'genre' => 'Palau',
            'detail' => 'Palau',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '121',
            'parent_id' => '11',
            'title' => 'Papua New Guinea',
            'genre' => 'Papua New Guinea',
            'detail' => 'Papua New Guinea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '122',
            'parent_id' => '11',
            'title' => 'Samoa',
            'genre' => 'Samoa',
            'detail' => 'Samoa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '123',
            'parent_id' => '11',
            'title' => 'Solomon Islands',
            'genre' => 'Solomon Islands',
            'detail' => 'Solomon Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '124',
            'parent_id' => '11',
            'title' => 'Tonga',
            'genre' => 'Tonga',
            'detail' => 'Tonga',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '125',
            'parent_id' => '11',
            'title' => 'Tuvalu',
            'genre' => 'Tuvalu',
            'detail' => 'Tuvalu',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '126',
            'parent_id' => '11',
            'title' => 'Vanuatu',
            'genre' => 'Vanuatu',
            'detail' => 'Vanuatu',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '127',
            'parent_id' => '12',
            'title' => 'Estonia',
            'genre' => 'Estonia',
            'detail' => 'Estonia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '128',
            'parent_id' => '12',
            'title' => 'Finland',
            'genre' => 'Finland',
            'detail' => 'Finland',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '129',
            'parent_id' => '12',
            'title' => 'France',
            'genre' => 'France',
            'detail' => 'France',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '130',
            'parent_id' => '12',
            'title' => 'Germany',
            'genre' => 'Germany',
            'detail' => 'Germany',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '131',
            'parent_id' => '12',
            'title' => 'Greece',
            'genre' => 'Greece',
            'detail' => 'Greece',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '132',
            'parent_id' => '12',
            'title' => 'Hungary',
            'genre' => 'Hungary',
            'detail' => 'Hungary',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '133',
            'parent_id' => '12',
            'title' => 'Iceland',
            'genre' => 'Iceland',
            'detail' => 'Iceland',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '134',
            'parent_id' => '12',
            'title' => 'Italy',
            'genre' => 'Italy',
            'detail' => 'Italy',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '135',
            'parent_id' => '12',
            'title' => 'Latvia',
            'genre' => 'Latvia',
            'detail' => 'Latvia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '136',
            'parent_id' => '12',
            'title' => 'Liechtenstein',
            'genre' => 'Liechtenstein',
            'detail' => 'Liechtenstein',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '137',
            'parent_id' => '12',
            'title' => 'Lithuania',
            'genre' => 'Lithuania',
            'detail' => 'Lithuania',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '138',
            'parent_id' => '12',
            'title' => 'Luxembourg',
            'genre' => 'Luxembourg',
            'detail' => 'Luxembourg',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '139',
            'parent_id' => '12',
            'title' => 'Malta',
            'genre' => 'Malta',
            'detail' => 'Malta',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '140',
            'parent_id' => '12',
            'title' => 'Moldova',
            'genre' => 'Moldova',
            'detail' => 'Moldova',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '141',
            'parent_id' => '12',
            'title' => 'Monaco',
            'genre' => 'Monaco',
            'detail' => 'Monaco',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '142',
            'parent_id' => '12',
            'title' => 'Montenegro',
            'genre' => 'Montenegro',
            'detail' => 'Montenegro',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '143',
            'parent_id' => '12',
            'title' => 'Netherlands',
            'genre' => 'Netherlands',
            'detail' => 'Netherlands',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '144',
            'parent_id' => '12',
            'title' => 'Norway',
            'genre' => 'Norway',
            'detail' => 'Norway',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '145',
            'parent_id' => '12',
            'title' => 'Poland',
            'genre' => 'Poland',
            'detail' => 'Poland',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '146',
            'parent_id' => '12',
            'title' => 'Portugal',
            'genre' => 'Portugal',
            'detail' => 'Portugal',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '147',
            'parent_id' => '12',
            'title' => 'Republic of Ireland',
            'genre' => 'Republic of Ireland',
            'detail' => 'Republic of Ireland',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '148',
            'parent_id' => '12',
            'title' => 'Republic of Macedonia',
            'genre' => 'Republic of Macedonia',
            'detail' => 'Republic of Macedonia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '149',
            'parent_id' => '12',
            'title' => 'Romania',
            'genre' => 'Romania',
            'detail' => 'Romania',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '150',
            'parent_id' => '12',
            'title' => 'Russia',
            'genre' => 'Russia',
            'detail' => 'Russia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '151',
            'parent_id' => '12',
            'title' => 'San Marino',
            'genre' => 'San Marino',
            'detail' => 'San Marino',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '152',
            'parent_id' => '12',
            'title' => 'Serbia',
            'genre' => 'Serbia',
            'detail' => 'Serbia',
            'url' => '',
        ));

        $this->model->create(array(
            'id' => '153',
            'parent_id' => '12',
            'title' => 'Slovakia',
            'genre' => 'Slovakia',
            'detail' => 'Slovakia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '154',
            'parent_id' => '12',
            'title' => 'Slovenia',
            'genre' => 'Slovenia',
            'detail' => 'Slovenia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '155',
            'parent_id' => '12',
            'title' => 'Spain',
            'genre' => 'Spain',
            'detail' => 'Spain',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '156',
            'parent_id' => '12',
            'title' => 'Sweden',
            'genre' => 'Sweden',
            'detail' => 'Sweden',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '157',
            'parent_id' => '12',
            'title' => 'Switzerland',
            'genre' => 'Switzerland',
            'detail' => 'Switzerland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '158',
            'parent_id' => '12',
            'title' => 'Ukraine',
            'genre' => 'Ukraine',
            'detail' => 'Ukraine',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '159',
            'parent_id' => '12',
            'title' => 'United Kingdom',
            'genre' => 'United Kingdom',
            'detail' => 'United Kingdom',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '160',
            'parent_id' => '12',
            'title' => 'Vatican City',
            'genre' => 'Vatican City',
            'detail' => 'Vatican City',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '161',
            'parent_id' => '13',
            'title' => 'Algeria',
            'genre' => 'Algeria',
            'detail' => 'Algeria',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '162',
            'parent_id' => '13',
            'title' => 'Angola',
            'genre' => 'Angola',
            'detail' => 'Angola',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '163',
            'parent_id' => '13',
            'title' => 'Benin',
            'genre' => 'Benin',
            'detail' => 'Benin',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '164',
            'parent_id' => '13',
            'title' => 'Botswana',
            'genre' => 'Botswana',
            'detail' => 'Botswana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '165',
            'parent_id' => '13',
            'title' => 'Burkina Faso',
            'genre' => 'Burkina Faso',
            'detail' => 'Burkina Faso',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '166',
            'parent_id' => '13',
            'title' => 'Burundi',
            'genre' => 'Burundi',
            'detail' => 'Burundi',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '167',
            'parent_id' => '13',
            'title' => 'Cameroon',
            'genre' => 'Cameroon',
            'detail' => 'Cameroon',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '168',
            'parent_id' => '13',
            'title' => 'Cape Verde',
            'genre' => 'Cape Verde',
            'detail' => 'Cape Verde',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '169',
            'parent_id' => '13',
            'title' => 'Central African Republic',
            'genre' => 'Central African Republic',
            'detail' => 'Central African Republic',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '170',
            'parent_id' => '13',
            'title' => 'Chad',
            'genre' => 'Chad',
            'detail' => 'Chad',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '171',
            'parent_id' => '13',
            'title' => 'Comoros',
            'genre' => 'Comoros',
            'detail' => 'Comoros',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '172',
            'parent_id' => '13',
            'title' => 'Democratic Republic of the Congo',
            'genre' => 'Democratic Republic of the Congo',
            'detail' => 'Democratic Republic of the Congo',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '173',
            'parent_id' => '13',
            'title' => 'Djibouti',
            'genre' => 'Djibouti',
            'detail' => 'Djibouti',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '174',
            'parent_id' => '13',
            'title' => 'Egypt',
            'genre' => 'Egypt',
            'detail' => 'Egypt',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '175',
            'parent_id' => '13',
            'title' => 'Equatorial Guinea',
            'genre' => 'Equatorial Guinea',
            'detail' => 'Equatorial Guinea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '176',
            'parent_id' => '13',
            'title' => 'Eritrea',
            'genre' => 'Eritrea',
            'detail' => 'Eritrea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '177',
            'parent_id' => '13',
            'title' => 'Ethiopia',
            'genre' => 'Ethiopia',
            'detail' => 'Ethiopia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '178',
            'parent_id' => '13',
            'title' => 'Gabon',
            'genre' => 'Gabon',
            'detail' => 'Gabon',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '179',
            'parent_id' => '13',
            'title' => 'Ghana',
            'genre' => 'Ghana',
            'detail' => 'Ghana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '180',
            'parent_id' => '13',
            'title' => 'Guinea',
            'genre' => 'Guinea',
            'detail' => 'Guinea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '181',
            'parent_id' => '13',
            'title' => 'Guinea-Bissau',
            'genre' => 'Guinea-Bissau',
            'detail' => 'Guinea-Bissau',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '182',
            'parent_id' => '13',
            'title' => 'Ivory Coast',
            'genre' => 'Ivory Coast',
            'detail' => 'Ivory Coast',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '183',
            'parent_id' => '13',
            'title' => 'Kenya',
            'genre' => 'Kenya',
            'detail' => 'Kenya',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '184',
            'parent_id' => '13',
            'title' => 'Lesotho',
            'genre' => 'Lesotho',
            'detail' => 'Lesotho',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '185',
            'parent_id' => '13',
            'title' => 'Liberia',
            'genre' => 'Liberia',
            'detail' => 'Liberia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '186',
            'parent_id' => '13',
            'title' => 'Libya',
            'genre' => 'Libya',
            'detail' => 'Libya',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '187',
            'parent_id' => '13',
            'title' => 'Madagascar',
            'genre' => 'Madagascar',
            'detail' => 'Madagascar',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '188',
            'parent_id' => '13',
            'title' => 'Malawi',
            'genre' => 'Malawi',
            'detail' => 'Malawi',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '189',
            'parent_id' => '13',
            'title' => 'Mali',
            'genre' => 'Mali',
            'detail' => 'Mali',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '190',
            'parent_id' => '13',
            'title' => 'Mauritania',
            'genre' => 'Mauritania',
            'detail' => 'Mauritania',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '191',
            'parent_id' => '13',
            'title' => 'Mauritius',
            'genre' => 'Mauritius',
            'detail' => 'Mauritius',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '192',
            'parent_id' => '13',
            'title' => 'Morocco',
            'genre' => 'Morocco',
            'detail' => 'Morocco',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '193',
            'parent_id' => '13',
            'title' => 'Mozambique',
            'genre' => 'Mozambique',
            'detail' => 'Mozambique',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '194',
            'parent_id' => '13',
            'title' => 'Namibia',
            'genre' => 'Namibia',
            'detail' => 'Namibia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '195',
            'parent_id' => '13',
            'title' => 'Niger',
            'genre' => 'Niger',
            'detail' => 'Niger',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '196',
            'parent_id' => '13',
            'title' => 'Nigeria',
            'genre' => 'Nigeria',
            'detail' => 'Nigeria',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '197',
            'parent_id' => '13',
            'title' => 'Republic of the Congo',
            'genre' => 'Republic of the Congo',
            'detail' => 'Republic of the Congo',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '198',
            'parent_id' => '13',
            'title' => 'Rwanda',
            'genre' => 'Rwanda',
            'detail' => 'Rwanda',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '199',
            'parent_id' => '13',
            'title' => 'São Tomé and Príncipe',
            'genre' => 'São Tomé and Príncipe',
            'detail' => 'São Tomé and Príncipe',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '200',
            'parent_id' => '13',
            'title' => 'Senegal',
            'genre' => 'Senegal',
            'detail' => 'Senegal',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '201',
            'parent_id' => '13',
            'title' => 'Seychelles',
            'genre' => 'Seychelles',
            'detail' => 'Seychelles',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '202',
            'parent_id' => '13',
            'title' => 'Sierra Leone',
            'genre' => 'Sierra Leone',
            'detail' => 'Sierra Leone',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '203',
            'parent_id' => '13',
            'title' => 'Somalia',
            'genre' => 'Somalia',
            'detail' => 'Somalia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '204',
            'parent_id' => '13',
            'title' => 'South Africa',
            'genre' => 'South Africa',
            'detail' => 'South Africa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '205',
            'parent_id' => '13',
            'title' => 'South Sudan',
            'genre' => 'South Sudan',
            'detail' => 'South Sudan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '206',
            'parent_id' => '13',
            'title' => 'Sudan',
            'genre' => 'Sudan',
            'detail' => 'Sudan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '207',
            'parent_id' => '13',
            'title' => 'Swaziland',
            'genre' => 'Swaziland',
            'detail' => 'Swaziland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '208',
            'parent_id' => '13',
            'title' => 'Tanzania',
            'genre' => 'Tanzania',
            'detail' => 'Tanzania',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '209',
            'parent_id' => '13',
            'title' => 'The Gambia',
            'genre' => 'The Gambia',
            'detail' => 'The Gambia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '210',
            'parent_id' => '13',
            'title' => 'Togo',
            'genre' => 'Togo',
            'detail' => 'Togo',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '211',
            'parent_id' => '13',
            'title' => 'Tunisia',
            'genre' => 'Tunisia',
            'detail' => 'Tunisia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '212',
            'parent_id' => '13',
            'title' => 'Uganda',
            'genre' => 'Uganda',
            'detail' => 'Uganda',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '213',
            'parent_id' => '13',
            'title' => 'Zambia',
            'genre' => 'Zambia',
            'detail' => 'Zambia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '214',
            'parent_id' => '13',
            'title' => 'Zimbabwe',
            'genre' => 'Zimbabwe',
            'detail' => 'Zimbabwe',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '215',
            'parent_id' => '44',
            'title' => 'Balochistan',
            'genre' => 'Balochistan',
            'detail' => 'Balochistan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '216',
            'parent_id' => '44',
            'title' => 'Khyber-Pakhtunkhwa',
            'genre' => 'Khyber-Pakhtunkhwa',
            'detail' => 'Khyber-Pakhtunkhwa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '217',
            'parent_id' => '44',
            'title' => 'Punjab',
            'genre' => 'Punjab',
            'detail' => 'Punjab',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '218',
            'parent_id' => '44',
            'title' => 'Sindh',
            'genre' => 'Sindh',
            'detail' => 'Sindh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '219',
            'parent_id' => '44',
            'title' => 'Azad Jammu and Kashmir',
            'genre' => 'Azad Jammu and Kashmir',
            'detail' => 'Azad Jammu and Kashmir',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '220',
            'parent_id' => '44',
            'title' => 'Federally Administered Tribal Areas',
            'genre' => 'Federally Administered Tribal Areas',
            'detail' => 'Federally Administered Tribal Areas',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '221',
            'parent_id' => '44',
            'title' => 'Gilgit–Baltistan',
            'genre' => 'Gilgit–Baltistan',
            'detail' => 'Gilgit–Baltistan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '222',
            'parent_id' => '44',
            'title' => 'Islamabad Capital Territory',
            'genre' => 'Islamabad Capital Territory',
            'detail' => 'Islamabad Capital Territory',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '223',
            'parent_id' => '99',
            'title' => 'California',
            'genre' => 'California',
            'detail' => 'California',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '224',
            'parent_id' => '99',
            'title' => 'Texas',
            'genre' => 'Texas',
            'detail' => 'Texas',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '225',
            'parent_id' => '99',
            'title' => 'New York',
            'genre' => 'New York',
            'detail' => 'New York',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '226',
            'parent_id' => '99',
            'title' => 'Florida',
            'genre' => 'Florida',
            'detail' => 'Florida',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '227',
            'parent_id' => '99',
            'title' => 'Illinois',
            'genre' => 'Illinois',
            'detail' => 'Illinois',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '228',
            'parent_id' => '99',
            'title' => 'Ohio',
            'genre' => 'Ohio',
            'detail' => 'Ohio',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '229',
            'parent_id' => '99',
            'title' => 'Pennsylvania',
            'genre' => 'Pennsylvania',
            'detail' => 'Pennsylvania',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '230',
            'parent_id' => '99',
            'title' => 'Massachusetts',
            'genre' => 'Massachusetts',
            'detail' => 'Massachusetts',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '231',
            'parent_id' => '99',
            'title' => 'New Jersey',
            'genre' => 'New Jersey',
            'detail' => 'New Jersey',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '232',
            'parent_id' => '99',
            'title' => 'Arizona',
            'genre' => 'Arizona',
            'detail' => 'Arizona',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '233',
            'parent_id' => '99',
            'title' => 'Michigan',
            'genre' => 'Michigan',
            'detail' => 'Michigan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '234',
            'parent_id' => '99',
            'title' => 'Washington',
            'genre' => 'Washington',
            'detail' => 'Washington',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '235',
            'parent_id' => '99',
            'title' => 'North Carolina',
            'genre' => 'North Carolina',
            'detail' => 'North Carolina',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '236',
            'parent_id' => '99',
            'title' => 'Virginia',
            'genre' => 'Virginia',
            'detail' => 'Virginia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '237',
            'parent_id' => '99',
            'title' => 'Maryland',
            'genre' => 'Maryland',
            'detail' => 'Maryland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '238',
            'parent_id' => '99',
            'title' => 'Georgia',
            'genre' => 'Georgia',
            'detail' => 'Georgia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '239',
            'parent_id' => '99',
            'title' => 'Minnesota',
            'genre' => 'Minnesota',
            'detail' => 'Minnesota',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '240',
            'parent_id' => '99',
            'title' => 'Indiana',
            'genre' => 'Indiana',
            'detail' => 'Indiana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '241',
            'parent_id' => '99',
            'title' => 'Colorado',
            'genre' => 'Colorado',
            'detail' => 'Colorado',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '242',
            'parent_id' => '99',
            'title' => 'Missouri',
            'genre' => 'Missouri',
            'detail' => 'Missouri',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '243',
            'parent_id' => '99',
            'title' => 'Wisconsin',
            'genre' => 'Wisconsin',
            'detail' => 'Wisconsin',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '244',
            'parent_id' => '99',
            'title' => 'Tennessee',
            'genre' => 'Tennessee',
            'detail' => 'Tennessee',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '245',
            'parent_id' => '99',
            'title' => 'Alabama',
            'genre' => 'Alabama',
            'detail' => 'Alabama',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '246',
            'parent_id' => '99',
            'title' => 'Oregon',
            'genre' => 'Oregon',
            'detail' => 'Oregon',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '247',
            'parent_id' => '99',
            'title' => 'Connecticut',
            'genre' => 'Connecticut',
            'detail' => 'Connecticut',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '248',
            'parent_id' => '99',
            'title' => 'Oklahoma',
            'genre' => 'Oklahoma',
            'detail' => 'Oklahoma',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '249',
            'parent_id' => '99',
            'title' => 'Louisiana',
            'genre' => 'Louisiana',
            'detail' => 'Louisiana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '250',
            'parent_id' => '99',
            'title' => 'Utah',
            'genre' => 'Utah',
            'detail' => 'Utah',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '251',
            'parent_id' => '99',
            'title' => 'Nevada',
            'genre' => 'Nevada',
            'detail' => 'Nevada',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '252',
            'parent_id' => '99',
            'title' => 'Kentucky',
            'genre' => 'Kentucky',
            'detail' => 'Kentucky',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '253',
            'parent_id' => '99',
            'title' => 'Iowa',
            'genre' => 'Iowa',
            'detail' => 'Iowa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '254',
            'parent_id' => '99',
            'title' => 'Kansas',
            'genre' => 'Kansas',
            'detail' => 'Kansas',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '255',
            'parent_id' => '99',
            'title' => 'South Carolina',
            'genre' => 'South Carolina',
            'detail' => 'South Carolina',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '256',
            'parent_id' => '99',
            'title' => 'Arkansas',
            'genre' => 'Arkansas',
            'detail' => 'Arkansas',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '257',
            'parent_id' => '99',
            'title' => 'Mississippi',
            'genre' => 'Mississippi',
            'detail' => 'Mississippi',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '258',
            'parent_id' => '99',
            'title' => 'New Mexico',
            'genre' => 'New Mexico',
            'detail' => 'New Mexico',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '259',
            'parent_id' => '99',
            'title' => 'Nebraska',
            'genre' => 'Nebraska',
            'detail' => 'Nebraska',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '260',
            'parent_id' => '99',
            'title' => 'New Hampshire',
            'genre' => 'New Hampshire',
            'detail' => 'New Hampshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '261',
            'parent_id' => '99',
            'title' => 'Maine',
            'genre' => 'Maine',
            'detail' => 'Maine',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '262',
            'parent_id' => '99',
            'title' => 'Rhode Island',
            'genre' => 'Rhode Island',
            'detail' => 'Rhode Island',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '263',
            'parent_id' => '99',
            'title' => 'Hawaii',
            'genre' => 'Hawaii',
            'detail' => 'Hawaii',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '264',
            'parent_id' => '99',
            'title' => 'Idaho',
            'genre' => 'Idaho',
            'detail' => 'Idaho',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '265',
            'parent_id' => '99',
            'title' => 'West Virginia',
            'genre' => 'West Virginia',
            'detail' => 'West Virginia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '266',
            'parent_id' => '99',
            'title' => 'Montana',
            'genre' => 'Montana',
            'detail' => 'Montana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '267',
            'parent_id' => '99',
            'title' => 'Alaska',
            'genre' => 'Alaska',
            'detail' => 'Alaska',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '268',
            'parent_id' => '99',
            'title' => 'District of Columbia',
            'genre' => 'District of Columbia',
            'detail' => 'District of Columbia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '269',
            'parent_id' => '99',
            'title' => 'South Dakota',
            'genre' => 'South Dakota',
            'detail' => 'South Dakota',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '270',
            'parent_id' => '9',
            'title' => 'North Dakota',
            'genre' => 'North Dakota',
            'detail' => 'North Dakota',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '271',
            'parent_id' => '99',
            'title' => 'Wyoming',
            'genre' => 'Wyoming',
            'detail' => 'Wyoming',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '272',
            'parent_id' => '99',
            'title' => 'Delaware',
            'genre' => 'Delaware',
            'detail' => 'Delaware',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '273',
            'parent_id' => '99',
            'title' => 'Vermont',
            'genre' => 'Vermont',
            'detail' => 'Vermont',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '274',
            'parent_id' => '130',
            'title' => 'Baden-Württemberg',
            'genre' => 'Baden-Württemberg',
            'detail' => 'Baden-Württemberg',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '275',
            'parent_id' => '130',
            'title' => 'Bavaria',
            'genre' => 'Bavaria',
            'detail' => 'Bavaria',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '276',
            'parent_id' => '130',
            'title' => 'Berlin',
            'genre' => 'Berlin',
            'detail' => 'Berlin',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '277',
            'parent_id' => '130',
            'title' => 'Brandenburg',
            'genre' => 'Brandenburg',
            'detail' => 'Brandenburg',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '278',
            'parent_id' => '130',
            'title' => 'Bremen',
            'genre' => 'Bremen',
            'detail' => 'Bremen',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '279',
            'parent_id' => '130',
            'title' => 'Hamburg',
            'genre' => 'Hamburg',
            'detail' => 'Hamburg',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '280',
            'parent_id' => '130',
            'title' => 'Hesse',
            'genre' => 'Hesse',
            'detail' => 'Hesse',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '281',
            'parent_id' => '130',
            'title' => 'Lower Saxony',
            'genre' => 'Lower Saxony',
            'detail' => 'Lower Saxony',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '282',
            'parent_id' => '130',
            'title' => 'Mecklenburg-Vorpommern',
            'genre' => 'Mecklenburg-Vorpommern',
            'detail' => 'Mecklenburg-Vorpommern',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '283',
            'parent_id' => '130',
            'title' => 'North Rhine-Westphalia',
            'genre' => 'North Rhine-Westphalia',
            'detail' => 'North Rhine-Westphalia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '284',
            'parent_id' => '130',
            'title' => 'Rhineland-Palatinate',
            'genre' => 'Rhineland-Palatinate',
            'detail' => 'Rhineland-Palatinate',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '285',
            'parent_id' => '130',
            'title' => 'Saarland',
            'genre' => 'Saarland',
            'detail' => 'Saarland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '286',
            'parent_id' => '130',
            'title' => 'Saxony',
            'genre' => 'Saxony',
            'detail' => 'Saxony',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '287',
            'parent_id' => '130',
            'title' => 'Saxony-Anhalt',
            'genre' => 'Saxony-Anhalt',
            'detail' => 'Saxony-Anhalt',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '288',
            'parent_id' => '130',
            'title' => 'Schleswig-Holstein',
            'genre' => 'Schleswig-Holstein',
            'detail' => 'Schleswig-Holstein',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '289',
            'parent_id' => '130',
            'title' => 'Thuringia',
            'genre' => 'Thuringia',
            'detail' => 'Thuringia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '290',
            'parent_id' => '25',
            'title' => 'Maharashtra',
            'genre' => 'Maharashtra',
            'detail' => 'Maharashtra',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '291',
            'parent_id' => '25',
            'title' => 'Uttar Pradesh',
            'genre' => 'Uttar Pradesh',
            'detail' => 'Uttar Pradesh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '292',
            'parent_id' => '25',
            'title' => 'Delhi',
            'genre' => 'Delhi',
            'detail' => 'Delhi',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '293',
            'parent_id' => '25',
            'title' => 'West Bengal',
            'genre' => 'West Bengal',
            'detail' => 'West Bengal',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '294',
            'parent_id' => '25',
            'title' => 'Gujarat',
            'genre' => 'Gujarat',
            'detail' => 'Gujarat',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '295',
            'parent_id' => '25',
            'title' => 'Tamil Nadu',
            'genre' => 'Tamil Nadu',
            'detail' => 'Tamil Nadu',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '296',
            'parent_id' => '25',
            'title' => 'Andhra Pradesh',
            'genre' => 'Andhra Pradesh',
            'detail' => 'Andhra Pradesh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '297',
            'parent_id' => '25',
            'title' => 'Karnataka',
            'genre' => 'Karnataka',
            'detail' => 'Karnataka',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '298',
            'parent_id' => '25',
            'title' => 'Madhya Pradesh',
            'genre' => 'Madhya Pradesh',
            'detail' => 'Madhya Pradesh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '299',
            'parent_id' => '25',
            'title' => 'Rajasthan',
            'genre' => 'Rajasthan',
            'detail' => 'Rajasthan',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '300',
            'parent_id' => '25',
            'title' => 'Bihar',
            'genre' => 'Bihar',
            'detail' => 'Bihar',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '301',
            'parent_id' => '25',
            'title' => 'Punjab',
            'genre' => 'Punjab',
            'detail' => 'Punjab',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '302',
            'parent_id' => '25',
            'title' => 'Haryana',
            'genre' => 'Haryana',
            'detail' => 'Haryana',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '303',
            'parent_id' => '25',
            'title' => 'Kerala',
            'genre' => 'Kerala',
            'detail' => 'Kerala',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '304',
            'parent_id' => '25',
            'title' => 'Jharkhand',
            'genre' => 'Jharkhand',
            'detail' => 'Jharkhand',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '305',
            'parent_id' => '25',
            'title' => 'Orissa',
            'genre' => 'Orissa',
            'detail' => 'Orissa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '306',
            'parent_id' => '25',
            'title' => 'Chhattisgarh',
            'genre' => 'Chhattisgarh',
            'detail' => 'Chhattisgarh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '307',
            'parent_id' => '25',
            'title' => 'Assam',
            'genre' => 'Assam',
            'detail' => 'Assam',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '308',
            'parent_id' => '25',
            'title' => 'Jammu and Kashmir',
            'genre' => 'Jammu and Kashmir',
            'detail' => 'Jammu and Kashmir',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '309',
            'parent_id' => '25',
            'title' => 'Uttarakhand',
            'genre' => 'Uttarakhand',
            'detail' => 'Uttarakhand',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '310',
            'parent_id' => '25',
            'title' => 'Chandigarh',
            'genre' => 'Chandigarh',
            'detail' => 'Chandigarh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '311',
            'parent_id' => '25',
            'title' => 'Goa',
            'genre' => 'Goa',
            'detail' => 'Goa',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '312',
            'parent_id' => '25',
            'title' => 'Himachal Pradesh',
            'genre' => 'Himachal Pradesh',
            'detail' => 'Himachal Pradesh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '313',
            'parent_id' => '25',
            'title' => 'Manipur',
            'genre' => 'Manipur',
            'detail' => 'Manipur',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '314',
            'parent_id' => '25',
            'title' => 'Mizoram',
            'genre' => 'Mizoram',
            'detail' => 'Mizoram',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '315',
            'parent_id' => '25',
            'title' => 'Tripura',
            'genre' => 'Tripura',
            'detail' => 'Tripura',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '316',
            'parent_id' => '25',
            'title' => 'Meghalaya',
            'genre' => 'Meghalaya',
            'detail' => 'Meghalaya',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '317',
            'parent_id' => '25',
            'title' => 'Nagaland',
            'genre' => 'Nagaland',
            'detail' => 'Nagaland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '318',
            'parent_id' => '25',
            'title' => 'Puducherry',
            'genre' => 'Puducherry',
            'detail' => 'Puducherry',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '319',
            'parent_id' => '25',
            'title' => 'Daman and Diu',
            'genre' => 'Daman and Diu',
            'detail' => 'Daman and Diu',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '320',
            'parent_id' => '25',
            'title' => 'Arunachal Pradesh',
            'genre' => 'Arunachal Pradesh',
            'detail' => 'Arunachal Pradesh',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '321',
            'parent_id' => '25',
            'title' => 'Andaman and Nicobar Islands',
            'genre' => 'Andaman and Nicobar Islands',
            'detail' => 'Andaman and Nicobar Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '322',
            'parent_id' => '25',
            'title' => 'Dadra and Nagar Haveli',
            'genre' => 'Dadra and Nagar Haveli',
            'detail' => 'Dadra and Nagar Haveli',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '323',
            'parent_id' => '25',
            'title' => 'Sikkim',
            'genre' => 'Sikkim',
            'detail' => 'Sikkim',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '324',
            'parent_id' => '25',
            'title' => 'Lakshadweep',
            'genre' => 'Lakshadweep',
            'detail' => 'Lakshadweep',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '325',
            'parent_id' => '113',
            'title' => 'New South Wales',
            'genre' => 'New South Wales',
            'detail' => 'New South Wales',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '326',
            'parent_id' => '113',
            'title' => 'Victoria',
            'genre' => 'Victoria',
            'detail' => 'Victoria',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '327',
            'parent_id' => '113',
            'title' => 'Queensland',
            'genre' => 'Queensland',
            'detail' => 'Queensland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '328',
            'parent_id' => '113',
            'title' => 'Western Australia',
            'genre' => 'Western Australia',
            'detail' => 'Western Australia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '329',
            'parent_id' => '113',
            'title' => 'South Australia',
            'genre' => 'South Australia',
            'detail' => 'South Australia',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '330',
            'parent_id' => '113',
            'title' => 'Tasmania',
            'genre' => 'Tasmania',
            'detail' => 'Tasmania',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '331',
            'parent_id' => '113',
            'title' => 'Tasmania',
            'genre' => 'Tasmania',
            'detail' => 'Tasmania',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '332',
            'parent_id' => '113',
            'title' => 'Australian Capital Territory',
            'genre' => 'Australian Capital Territory',
            'detail' => 'Australian Capital Territory',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '333',
            'parent_id' => '113',
            'title' => 'Northern Territory',
            'genre' => 'Northern Territory',
            'detail' => 'Northern Territory',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '334',
            'parent_id' => '113',
            'title' => 'Christmas Island',
            'genre' => 'Christmas Island',
            'detail' => 'Christmas Island',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '335',
            'parent_id' => '113',
            'title' => 'Cocos Islands',
            'genre' => 'Cocos Islands',
            'detail' => 'Cocos Islands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '336',
            'parent_id' => '159',
            'title' => 'London',
            'genre' => 'London',
            'detail' => 'London',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '337',
            'parent_id' => '159',
            'title' => 'West Midlands',
            'genre' => 'West Midlands',
            'detail' => 'West Midlands',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '338',
            'parent_id' => '159',
            'title' => 'Greater Manchester',
            'genre' => 'Greater Manchester',
            'detail' => 'Greater Manchester',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '339',
            'parent_id' => '159',
            'title' => 'West Yorkshire',
            'genre' => 'West Yorkshire',
            'detail' => 'West Yorkshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '340',
            'parent_id' => '159',
            'title' => 'Kent',
            'genre' => 'Kent',
            'detail' => 'Kent',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '341',
            'parent_id' => '159',
            'title' => 'Merseyside',
            'genre' => 'Merseyside',
            'detail' => 'Merseyside',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '342',
            'parent_id' => '159',
            'title' => 'Essex',
            'genre' => 'Essex',
            'detail' => 'Essex',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '343',
            'parent_id' => '159',
            'title' => 'South Yorkshire',
            'genre' => 'South Yorkshire',
            'detail' => 'South Yorkshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '344',
            'parent_id' => '159',
            'title' => 'Hampshire',
            'genre' => 'Hampshire',
            'detail' => 'Hampshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '345',
            'parent_id' => '159',
            'title' => 'Surrey',
            'genre' => 'Surrey',
            'detail' => 'Surrey',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '346',
            'parent_id' => '159',
            'title' => 'Tyne and Wear',
            'genre' => 'Tyne and Wear',
            'detail' => 'Tyne and Wear',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '347',
            'parent_id' => '159',
            'title' => 'Hertfordshire',
            'genre' => 'Hertfordshire',
            'detail' => 'Hertfordshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '348',
            'parent_id' => '159',
            'title' => 'Lancashire',
            'genre' => 'Lancashire',
            'detail' => 'Lancashire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '349',
            'parent_id' => '159',
            'title' => 'Nottinghamshire',
            'genre' => 'Nottinghamshire',
            'detail' => 'Nottinghamshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '350',
            'parent_id' => '159',
            'title' => 'Cheshire',
            'genre' => 'Cheshire',
            'detail' => 'Cheshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '351',
            'parent_id' => '159',
            'title' => 'Staffordshire',
            'genre' => 'Staffordshire',
            'detail' => 'Staffordshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '352',
            'parent_id' => '159',
            'title' => 'Derbyshire',
            'genre' => 'Derbyshire',
            'detail' => 'Derbyshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '353',
            'parent_id' => '159',
            'title' => 'Norfolk',
            'genre' => 'Norfolk',
            'detail' => 'Norfolk',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '354',
            'parent_id' => '159',
            'title' => 'West Sussex',
            'genre' => 'West Sussex',
            'detail' => 'West Sussex',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '355',
            'parent_id' => '159',
            'title' => 'Northamptonshire',
            'genre' => 'Northamptonshire',
            'detail' => 'Northamptonshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '356',
            'parent_id' => '159',
            'title' => 'Oxfordshire',
            'genre' => 'Oxfordshire',
            'detail' => 'Oxfordshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '357',
            'parent_id' => '159',
            'title' => 'Devon',
            'genre' => 'Devon',
            'detail' => 'Devon',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '358',
            'parent_id' => '159',
            'title' => 'Suffolk',
            'genre' => 'Suffolk',
            'detail' => 'Suffolk',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '359',
            'parent_id' => '159',
            'title' => 'Lincolnshire',
            'genre' => 'Lincolnshire',
            'detail' => 'Lincolnshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '360',
            'parent_id' => '159',
            'title' => 'Gloucestershire',
            'genre' => 'Gloucestershire',
            'detail' => 'Gloucestershire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '361',
            'parent_id' => '159',
            'title' => 'Leicestershire',
            'genre' => 'Leicestershire',
            'detail' => 'Leicestershire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '362',
            'parent_id' => '159',
            'title' => 'Cambridgeshire',
            'genre' => 'Cambridgeshire',
            'detail' => 'Cambridgeshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '363',
            'parent_id' => '159',
            'title' => 'East Sussex',
            'genre' => 'East Sussex',
            'detail' => 'East Sussex',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '364',
            'parent_id' => '159',
            'title' => 'Durham',
            'genre' => 'Durham',
            'detail' => 'Durham',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '365',
            'parent_id' => '159',
            'title' => 'Bristol',
            'genre' => 'Bristol',
            'detail' => 'Bristol',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '366',
            'parent_id' => '159',
            'title' => 'Warwickshire',
            'genre' => 'Warwickshire',
            'detail' => 'Warwickshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '367',
            'parent_id' => '159',
            'title' => 'Buckinghamshire',
            'genre' => 'Buckinghamshire',
            'detail' => 'Buckinghamshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '368',
            'parent_id' => '159',
            'title' => 'North Yorkshire',
            'genre' => 'North Yorkshire',
            'detail' => 'North Yorkshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '369',
            'parent_id' => '159',
            'title' => 'Bedfordshire',
            'genre' => 'Bedfordshire',
            'detail' => 'Bedfordshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '370',
            'parent_id' => '159',
            'title' => 'Cumbria',
            'genre' => 'Cumbria',
            'detail' => 'Cumbria',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '371',
            'parent_id' => '159',
            'title' => 'Somerset',
            'genre' => 'Somerset',
            'detail' => 'Somerset',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '372',
            'parent_id' => '159',
            'title' => 'Cornwall',
            'genre' => 'Cornwall',
            'detail' => 'Cornwall',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '373',
            'parent_id' => '159',
            'title' => 'Wiltshire',
            'genre' => 'Wiltshire',
            'detail' => 'Wiltshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '374',
            'parent_id' => '159',
            'title' => 'Shropshire',
            'genre' => 'Shropshire',
            'detail' => 'Shropshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '375',
            'parent_id' => '159',
            'title' => 'Leicester',
            'genre' => 'Leicester',
            'detail' => 'Leicester',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '376',
            'parent_id' => '159',
            'title' => 'Worcestershire',
            'genre' => 'Worcestershire',
            'detail' => 'Worcestershire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '377',
            'parent_id' => '159',
            'title' => 'Kingston upon Hull',
            'genre' => 'Kingston upon Hull',
            'detail' => 'Kingston upon Hull',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '378',
            'parent_id' => '159',
            'title' => 'Plymouth',
            'genre' => 'Plymouth',
            'detail' => 'Plymouth',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '379',
            'parent_id' => '159',
            'title' => 'Stoke-on-Trent',
            'genre' => 'Stoke-on-Trent',
            'detail' => 'Stoke-on-Trent',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '380',
            'parent_id' => '159',
            'title' => 'Derby',
            'genre' => 'Derby',
            'detail' => 'Derby',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '381',
            'parent_id' => '159',
            'title' => 'Dorset',
            'genre' => 'Dorset',
            'detail' => 'Dorset',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '382',
            'parent_id' => '159',
            'title' => 'Nottingham',
            'genre' => 'Nottingham',
            'detail' => 'Nottingham',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '383',
            'parent_id' => '159',
            'title' => 'Southampton',
            'genre' => 'Southampton',
            'detail' => 'Southampton',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '384',
            'parent_id' => '159',
            'title' => 'Brighton and Hove',
            'genre' => 'Brighton and Hove',
            'detail' => 'Brighton and Hove',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '385',
            'parent_id' => '159',
            'title' => 'Herefordshire',
            'genre' => 'Herefordshire',
            'detail' => 'Herefordshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '386',
            'parent_id' => '159',
            'title' => 'Northumberland',
            'genre' => 'Northumberland',
            'detail' => 'Northumberland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '387',
            'parent_id' => '159',
            'title' => 'Portsmouth',
            'genre' => 'Portsmouth',
            'detail' => 'Portsmouth',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '388',
            'parent_id' => '159',
            'title' => 'East Riding of Yorkshire',
            'genre' => 'East Riding of Yorkshire',
            'detail' => 'East Riding of Yorkshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '389',
            'parent_id' => '159',
            'title' => 'Luton',
            'genre' => 'Luton',
            'detail' => 'Luton',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '390',
            'parent_id' => '159',
            'title' => 'Swindon',
            'genre' => 'Swindon',
            'detail' => 'Swindon',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '391',
            'parent_id' => '159',
            'title' => 'Southend-on-Sea',
            'genre' => 'Southend-on-Sea',
            'detail' => 'Southend-on-Sea',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '392',
            'parent_id' => '159',
            'title' => 'York',
            'genre' => 'York',
            'detail' => 'York',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '393',
            'parent_id' => '159',
            'title' => 'South Gloucestershire',
            'genre' => 'South Gloucestershire',
            'detail' => 'South Gloucestershire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '394',
            'parent_id' => '159',
            'title' => 'Milton Keynes',
            'genre' => 'Milton Keynes',
            'detail' => 'Milton Keynes',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '395',
            'parent_id' => '159',
            'title' => 'Bournemouth',
            'genre' => 'Bournemouth',
            'detail' => 'Bournemouth',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '396',
            'parent_id' => '159',
            'title' => 'North Somerset',
            'genre' => 'North Somerset',
            'detail' => 'North Somerset',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '397',
            'parent_id' => '159',
            'title' => 'Warrington',
            'genre' => 'Warrington',
            'detail' => 'Warrington',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '398',
            'parent_id' => '159',
            'title' => 'Peterborough',
            'genre' => 'Peterborough',
            'detail' => 'Peterborough',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '399',
            'parent_id' => '159',
            'title' => 'Reading',
            'genre' => 'Reading',
            'detail' => 'Reading',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '400',
            'parent_id' => '159',
            'title' => 'Blackpool',
            'genre' => 'Blackpool',
            'detail' => 'Blackpool',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '401',
            'parent_id' => '159',
            'title' => 'North East Lincolnshire',
            'genre' => 'North East Lincolnshire',
            'detail' => 'North East Lincolnshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '402',
            'parent_id' => '159',
            'title' => 'Middlesbrough',
            'genre' => 'Middlesbrough',
            'detail' => 'Middlesbrough',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '403',
            'parent_id' => '159',
            'title' => 'Stockton-on-Tees',
            'genre' => 'Stockton-on-Tees',
            'detail' => 'Stockton-on-Tees',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '404',
            'parent_id' => '159',
            'title' => 'Blackburn with Darwen',
            'genre' => 'Blackburn with Darwen',
            'detail' => 'Blackburn with Darwen',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '405',
            'parent_id' => '159',
            'title' => 'Torbay',
            'genre' => 'Torbay',
            'detail' => 'Torbay',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '406',
            'parent_id' => '159',
            'title' => 'Poole',
            'genre' => 'Poole',
            'detail' => 'Poole',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '407',
            'parent_id' => '159',
            'title' => 'Windsor and Maidenhead',
            'genre' => 'Windsor and Maidenhead',
            'detail' => 'Windsor and Maidenhead',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '408',
            'parent_id' => '159',
            'title' => 'North Lincolnshire',
            'genre' => 'North Lincolnshire',
            'detail' => 'North Lincolnshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '409',
            'parent_id' => '159',
            'title' => 'Bath and North East Somerset',
            'genre' => 'Bath and North East Somerset',
            'detail' => 'Bath and North East Somerset',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '410',
            'parent_id' => '159',
            'title' => 'Slough',
            'genre' => 'Slough',
            'detail' => 'Slough',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '411',
            'parent_id' => '159',
            'title' => 'Halton',
            'genre' => 'Halton',
            'detail' => 'Halton',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '412',
            'parent_id' => '159',
            'title' => 'Isle of Wight',
            'genre' => 'Isle of Wight',
            'detail' => 'Isle of Wight',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '413',
            'parent_id' => '159',
            'title' => 'Bracknell Forest',
            'genre' => 'Bracknell Forest',
            'detail' => 'Bracknell Forest',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '414',
            'parent_id' => '159',
            'title' => 'Hartlepool',
            'genre' => 'Hartlepool',
            'detail' => 'Hartlepool',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '415',
            'parent_id' => '159',
            'title' => 'West Berkshire',
            'genre' => 'West Berkshire',
            'detail' => 'West Berkshire',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '416',
            'parent_id' => '159',
            'title' => 'Redcar and Cleveland',
            'genre' => 'Redcar and Cleveland',
            'detail' => 'Redcar and Cleveland',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '417',
            'parent_id' => '159',
            'title' => 'Wokingham',
            'genre' => 'Wokingham',
            'detail' => 'Wokingham',
            'url' => '',
        ));
        $this->model->create(array(
            'id' => '418',
            'parent_id' => '159',
            'title' => 'Rutland',
            'genre' => 'Rutland',
            'detail' => 'Rutland',
            'url' => '',
        ));




    }

}