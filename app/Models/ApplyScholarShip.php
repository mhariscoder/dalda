<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplyScholarShip extends Model
{
    use SoftDeletes;

    protected $table = "scoloar_ship";

    protected $fillable = [
        'user_id',
        'student_id',
        'year',
        'fullname',
        'matric_board',
        'marks_in_matric',
        'current_city',
        'beneficary_name',
        'beneficary_iban_number',
        'beneficary_bank',
        'beneficary_cnic',
        'beneficary_bank_address',
        'cnic_number',
        'mobile_number',
        'whatsapp_number',
        'group',
        'email_address',
        'goals',
        'suggestion',
        'name_of_college',
        'postal_address_of_college',
        'telephone_of_college',
        'principal_name',
        'principal_number',
        'college_email',
        'teacher_name1',
        'teach_cell_no1',
        'teacher_address1',
        'teacher_name2',
        'teach_cell_no2',
        'teacher_address2',
        'family_members',
        'monthly_income',
        'home_in_sqr_yards',
        'source_of_income',
        'any_scholarship',
        'your_contribution',
        'international_scolarship',
        'standarized_test',
        'english_ability_test',
        'share_any',
        'student_photo',
        'marksheet_photo',
        'beneficary_cnic_photo',
        'parent_cnic_photo',
        'status'
    ];

    const YEARS = ['2010-2011', '2011-2012', '2012-2013', '2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018', '2018-2019', '2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024', '2024-2025', '2025-2026', '2026-2027', '2027-2028'];
    const CHECK_OPTIONS = ['yes', 'no', 'maybe'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
