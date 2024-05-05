<?php

namespace App\Imports;

use App\Models\ClaimScholarShip;
use App\Models\ApplyScholarShip;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;

class ClaimForScholarShipImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {   
        return new ClaimScholarShip([
            'user_id' => auth()->user()->id,
            'student_id' => $row['student_id'] ?? null,
            'fullname' => $row['fullname'] ?? null,
            'board_intermediate' => $row['board_intermediate'] ?? null,
            'marks_in_xi' => $row['marks_in_xi'] ?? null,
            'marks_in_xii' => $row['marks_in_xii'] ?? null,
            'marks_in_bachelor_one' => $row['marks_in_bachelor_one'] ?? null,
            'marks_in_bachelor_two' => $row['marks_in_bachelor_two'] ?? null,
            'marks_in_bachelor_three' => $row['marks_in_bachelor_three'] ?? null,
            'marks_in_bachelor_four' => $row['marks_in_bachelor_four'] ?? null,
            'marks_in_bachelor_five' => $row['marks_in_bachelor_five'] ?? null,
            'degree_name' => $row['degree_name'] ?? null,
            'current_city' => $row['current_city'] ?? null,
            'beneficary_name' => $row['beneficary_name'] ?? null,
            'beneficary_iban_number' => $row['beneficary_iban_number'] ?? null,
            'beneficary_bank' => $row['beneficary_bank'] ?? null,
            'beneficary_cnic' => $row['beneficary_cnic'] ?? null,
            'cnic_number' => $row['cnic_number'] ?? null,
            'mobile_number' => $row['mobile_number'] ?? null,
            'whatsapp_number' => $row['whatsapp_number'] ?? null,
            'email_address' => $row['email_address'] ?? null,
            'international_scolarship' => $row['international_scolarship'] ?? null,
            'standarized_test' => $row['standarized_test'] ?? null,
            'english_ability_test' => $row['english_ability_test'] ?? null,
            'intermediate_repeated' => $row['intermediate_repeated'] ?? null,
            'share_any' => $row['share_any'] ?? null,
            'student_photo' => $row['student_photo'] ?? null,
            'matric_photo' => $row['matric_photo'] ?? null,
            'intermediate_photo' => $row['intermediate_photo'] ?? null,
            'bachelor_one_photo' => $row['bachelor_one_photo'] ?? null,
            'bachelor_two_photo' => $row['bachelor_two_photo'] ?? null,
            'bachelor_three_photo' => $row['bachelor_three_photo'] ?? null,
            'bachelor_four_photo' => $row['bachelor_four_photo'] ?? null,
            'bachelor_five_photo' => $row['bachelor_five_photo'] ?? null,
            'beneficary_cnic_photo' => $row['beneficary_cnic_photo'] ?? null,
            'parent_cnic_photo' => $row['parent_cnic_photo'] ?? null,
            'status' => $row['status'] ?? null,
            'other_degree_option' => $row['other_degree_option'] ?? null,
            'father_name' => $row['father_name'] ?? null,
            'year' => $row['year'] ?? null,
            'achieved_position' => $row['achieved_position'] ?? null,
            'current_college_institute_university' => $row['current_college_institute_university'] ?? null,
            // 'relatives_name' => $row['relatives_name'] ?? null,
            // 'relatives_email' => $row['relatives_email'] ?? null,
            // 'relatives_contact' => $row['relatives_contact'] ?? null,
            // 'relatives_address' => $row['relatives_address'] ?? null,
            'relatives_detail' => $row['relatives_detail'] ?? null,
            'student_email' => $row['student_email'] ?? null,
            'intermediate_board' => $row['intermediate_board'] ?? null,
            'gender' => $row['gender'] ?? null
        ]);
    }

    public function rules(): array
    {
        return [
            'student_id' => [
                'required',
                'exists:users,student_id',
                'exists:scoloar_ship,student_id,status,approved',
                'unique:claim_form,student_id'
            ],
            'year' => 'required|in:' . implode(',', ClaimScholarShip::YEARS),
            'fullname' => 'required|max:100',
            'board_intermediate' => 'required|max:100',
            'marks_in_xi' => 'required|max:7|regex:/^[1-5]{1}[0-9]{2}\/5[0-9]{2}$/i',
            'marks_in_xii' => 'sometimes|nullable|max:9|regex:/^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$/i',
            'marks_in_bachelor_one' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_two' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_three' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_four' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_five' => 'sometimes|nullable|max:4',
            'degree_name' => 'sometimes|nullable|max:100',
            'current_city' => 'required|max:100',
            'beneficary_name' => 'required|max:100',
            'beneficary_iban_number' => 'required|max:34',
            'beneficary_bank' => 'required|max:150',
            'beneficary_cnic' => 'required|digits_between:13,15',
            'cnic_number' => 'required|digits_between:13,15',
            'mobile_number' => 'required|digits_between:11,13',
            'whatsapp_number' => 'sometimes|nullable|digits_between:11,13',
            'international_scolarship' => 'required|in:' . implode(',', ClaimScholarShip::CHECK_OPTIONS),
            'standarized_test' => 'required|in:' . implode(',', ClaimScholarShip::CHECK_OPTIONS),
            'english_ability_test' => 'required|in:' . implode(',', ClaimScholarShip::CHECK_OPTIONS),
            'share_any' => 'sometimes|nullable|max:250',
            'student_photo' => 'required|max:250',
            'matric_photo' => 'required|max:250',
            'intermediate_photo' => 'required|max:250',
            'bachelor_one_photo' => 'required|max:250',
            'bachelor_two_photo' => 'required|max:250',
            'bachelor_three_photo' => 'required|max:250',
            'bachelor_four_photo' => 'required|max:250',
            'bachelor_five_photo' => 'required|max:250',
            'beneficary_cnic_photo' => 'required|max:250',
            'parent_cnic_photo' => 'required|max:250',
            'status' => 'required',
            'other_degree_option' => 'sometimes|nullable|max:100',
            'father_name' => 'sometimes|nullable|max:100',
            'achieved_position' => 'sometimes|nullable|max:100',
            'current_college_institute_university' => 'sometimes|nullable|max:150',
            // 'relatives_name' => 'sometimes|nullable|max:100',
            // 'relatives_email' => 'sometimes|nullable|email|max:100',
            // 'relatives_contact' => 'sometimes|nullable|max:15',
            // 'relatives_address' => 'sometimes|nullable|max:150'
            'relatives_detail' => 'required|max:250',
            'student_email' => 'required|nullable|max:250',
            'intermediate_board' => 'required|nullable|max:250',
            'gender' => 'required|nullable|max:250',
        ];
    }
}
