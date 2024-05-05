<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClaimScholarShip extends Model
{
    use SoftDeletes;

    protected $table = "claim_form";

    protected $fillable = [
        'user_id',
        'student_id',
        'fullname',
        'board_intermediate',
        'marks_in_xi',
        'marks_in_xii',
        'marks_in_bachelor_one',
        'marks_in_bachelor_two',
        'marks_in_bachelor_three',
        'marks_in_bachelor_four',
        'marks_in_bachelor_five',
        'degree_name',
        'current_city',
        'beneficary_name',
        'beneficary_iban_number',
        'beneficary_bank',
        'beneficary_cnic',
        'beneficary_bank_address',
        'cnic_number',
        'mobile_number',
        'whatsapp_number',
        'email_address',
        'goals',
        'suggestion',
        'your_contribution',
        'international_scolarship',
        'standarized_test',
        'english_ability_test',
        'intermediate_repeated',
        'share_any',
        'student_photo',
        'matric_photo',
        'intermediate_photo',
        'bachelor_one_photo',
        'bachelor_two_photo',
        'bachelor_three_photo',
        'bachelor_four_photo',
        'bachelor_five_photo',
        'beneficary_cnic_photo',
        'parent_cnic_photo',
        'status',
        'other_degree_option',
        'father_name',
        'year',
        'achieved_position',
        'current_college_institute_university',
        'relatives_name',
        'relatives_email',
        'relatives_contact',
        'relatives_address',
        'relatives_detail'
    ];

    const YEARS = ['2010-2011', '2011-2012', '2012-2013', '2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018', '2018-2019', '2019-2020', '2020-2021', '2021-2022', '2022-2023', '2023-2024', '2024-2025', '2025-2026', '2026-2027', '2027-2028'];
    const CHECK_OPTIONS = ['yes', 'no', 'maybe'];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function installments()
    {
        return $this->hasMany(Installment::class,'claim_id','id');
    }
}
