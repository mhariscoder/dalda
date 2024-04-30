<?php
namespace App\Imports;

use App\Models\ApplyScholarShip;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApplyScholarShipImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {   
        $student_id = 0;
        $user = User::query()->where('email', $row['email_address'])->first();
        
        if($user) {
            $student_id = $user->id;
        } else {
            $user = User::create([
                'first_name' => $row['fullname'] ?? null,
                'email' => $row['email_address'] ?? null,
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'is_verified' => 1                
            ]);

            User::whereId($user->id)->update(['student_id' => $user->id]);
            $student_id = $user->id;
        }

        return new ApplyScholarShip([
            'user_id' => $user->id,
            'student_id' => $student_id,
            'year' => $row['year'] ?? null,
            'fullname' => $row['fullname'] ?? null,
            'matric_board' => $row['matric_board'] ?? null,
            'marks_in_matric' => $row['marks_in_matric'] ?? null,
            'current_city' => $row['current_city'] ?? null,
            'beneficary_name' => $row['beneficary_name'] ?? null,
            'beneficary_iban_number' => $row['beneficary_iban_number'] ?? null,
            'beneficary_bank' => $row['beneficary_bank'] ?? null,
            'beneficary_cnic' => $row['beneficary_cnic'] ?? null,
            'cnic_number' => $row['cnic_number'] ?? null,
            'mobile_number' => $row['mobile_number'] ?? null,
            'whatsapp_number' => $row['whatsapp_number'] ?? null,
            'group' => $row['group'] ?? null,
            'email_address' => $row['email_address'] ?? null,
            'name_of_college' => $row['name_of_college'] ?? null,
            'postal_address_of_college' => $row['postal_address_of_college'] ?? null,
            'telephone_of_college' => $row['telephone_of_college'] ?? null,
            'principal_name' => $row['principal_name'] ?? null,
            'principal_number' => $row['principal_number'] ?? null,
            'college_email' => $row['college_email'] ?? null,
            'teacher_name1' => $row['teacher_name1'] ?? null,
            'teach_cell_no1' => $row['teach_cell_no1'] ?? null,
            'teacher_address1' => $row['teacher_address1'] ?? null,
            'teacher_name2' => $row['teacher_name2'] ?? null,
            'teach_cell_no2' => $row['teach_cell_no2'] ?? null,
            'teacher_address2' => $row['teacher_address2'] ?? null,
            'family_members' => $row['family_members'] ?? null,
            'monthly_income' => $row['monthly_income'] ?? null,
            'home_in_sqr_yards' => $row['home_in_sqr_yards'] ?? null,
            'source_of_income' => $row['source_of_income'] ?? null,
            'any_scholarship' => $row['any_scholarship'] ?? null,
            'international_scolarship' => $row['international_scolarship'] ?? null,
            'standarized_test' => $row['standarized_test'] ?? null,
            'student_photo' => $row['student_photo'] ?? null,
            'marksheet_photo' => $row['marksheet_photo'] ?? null,
            'beneficary_cnic_photo' => $row['beneficary_cnic_photo'] ?? null,
            'parent_cnic_photo' => $row['parent_cnic_photo'] ?? null,
            'status' => $row['status'] ?? null ?? null,
            'scholarship_as_per_education' => $row['scholarship_as_per_education'] ?? null,
            'father_name' => $row['father_name'] ?? null,
            'position_board_detail' => $row['position_board_detail'] ?? null,
            'career_path_details' => $row['career_path_details'] ?? null,
            'matriculation_year' => $row['matriculation_year'] ?? null,
            'preferred_test_location' => $row['preferred_test_location'] ?? null,
            'intermediate_studies' => $row['intermediate_studies'] ?? null,
            'residential_address' => $row['residential_address'] ?? null,
            'relatives_name' => $row['relatives_name'] ?? null,
            'relatives_email' => $row['relatives_email'] ?? null,
            'relatives_contact' => $row['relatives_contact'] ?? null,
            'relatives_address' => $row['relatives_address'] ?? null,
            'madrasa_name' => $row['madrasa_name'] ?? null,
            'madrasa_address' => $row['madrasa_address'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:users,student_id',
            'year' => 'required|in:' . implode(',', ApplyScholarShip::YEARS),
            'matric_board' => 'required|max:150',
            'group' => 'required|max:150',
            'marks_in_matric' => 'required|max:9|regex:/^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$/i',
            'current_city' => 'required|max:100',
            'beneficary_name' => 'required|max:100',
            'beneficary_iban_number' => 'required|max:34',
            'beneficary_cnic' => 'required|digits_between:13,15',
            'cnic_number' => 'required|digits_between:13,15',
            'mobile_number' => 'required|digits_between:11,13',
            'whatsapp_number' => 'sometimes|nullable|digits_between:11,13',
            'international_scolarship' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'standarized_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'student_photo' => 'required|max:250',
            'marksheet_photo' => 'required|max:250',
            'beneficary_cnic_photo' => 'required|max:250',
            'parent_cnic_photo' => 'required|max:250',
            'scholarship_as_per_education' => 'required|max:250',
            'father_name' => 'required|max:250',
            'position_board_detail' => 'required|max:250',
            'career_path_details' => 'required|max:250',
            'matriculation_year' => 'required|max:250',
            'preferred_test_location' => 'required|max:250',
            'intermediate_studies' => 'required|max:250',
            'residential_address' => 'required|max:250',
            'relatives_name' => 'required|max:250',
            'relatives_email' => 'required|max:250',
            'relatives_contact' => 'required|max:250',
            'relatives_address' => 'required|max:250',
            'madrasa_name' => 'sometimes|nullable|max:250',
            'madrasa_address' => 'sometimes|nullable|max:250',
        ];
    }
}
