<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\ClaimScholarShip;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function applyForScholarship()
    {
        $students = ApplyScholarShip::with('getUser')->latest()->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $currentDate = Carbon::now()->isoFormat('lll');
        $spreadsheet->getActiveSheet()->mergeCells('A1:AO1')->getCell('A1')->setValue("DALDA FOUNDATION");
        $spreadsheet->getActiveSheet()->mergeCells('A2:AO2')->getCell('A2')->setValue("APPLIED STUDENTS SCHOLARSHIPS");
        $spreadsheet->getActiveSheet()->mergeCells('A3:AO3')->getCell('A3')->setValue('Report Date: ' . $currentDate);

        $spreadsheet->getActiveSheet()->getStyle('A1:AO1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A1:AO1')->getFont()
            ->setSize(18)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:AO1')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(30);

        $spreadsheet->getActiveSheet()->getStyle('A2:AO2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A2:AO2')->getFont()
            ->setSize(15)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A2:AO2')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A3:AO3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A3:AO3')->getFont()
            ->setSize(12)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

        $spreadsheet->getActiveSheet()->getStyle('A3:V3')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getRowDimension(3)->setRowHeight(18);

        $header = 4;

        $spreadsheet->getActiveSheet()->getStyle('A' . $header . ':AO' . $header)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EBEBEB');
        $spreadsheet->getActiveSheet()->getStyle('A' . $header . ':AO' . $header)->getFont()->setBold(true);

        foreach (range('A', 'AO') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $sheet
            ->setCellValue('A' . $header, 'STUDENT ID')
            ->setCellValue('B' . $header, 'STUDENT NAME')
            ->setCellValue('C' . $header, 'YEAR')
            ->setCellValue('D' . $header, 'MATRIC BOARD')
            ->setCellValue('E' . $header, 'GROUP')
            ->setCellValue('F' . $header, 'MARKS IN MATRIC')
            ->setCellValue('G' . $header, 'CURRENT CITY')
            ->setCellValue('H' . $header, 'BENEFICARY NAME')
            ->setCellValue('I' . $header, 'BENEFICARY IBAN NUMBER')
            ->setCellValue('J' . $header, 'BENEFICARY BANK')
            ->setCellValue('K' . $header, 'BENEFICARY CNIC')
            ->setCellValue('L' . $header, 'BENEFICARY BANK ADDRESS')
            ->setCellValue('M' . $header, 'NAME OF COLLEGE')
            ->setCellValue('N' . $header, 'POSTAL ADDRESS OF COLLEGE')
            ->setCellValue('O' . $header, 'TELEPHONE NUMBER OF COLLEGE')
            ->setCellValue('P' . $header, 'PRINCIPAL NAME')
            ->setCellValue('Q' . $header, 'PRINCIPAL NUMBER')
            ->setCellValue('R' . $header, 'COLLEGE EMAIL')
            ->setCellValue('S' . $header, 'REFERENCE NAME')
            ->setCellValue('T' . $header, 'REFERENCE NUMBER')
            ->setCellValue('U' . $header, 'REFERENCE ADDRESS')
            ->setCellValue('V' . $header, 'REFERENCE NAME 2')
            ->setCellValue('W' . $header, 'REFERENCE NUMBER 2')
            ->setCellValue('X' . $header, 'REFERENCE ADDRESS 2')
            ->setCellValue('Y' . $header, 'FAMILY MEMBERS')
            ->setCellValue('Z' . $header, 'MONTHLY INCOME')
            ->setCellValue('AA' . $header, 'SQR YARDS OF HOME/FLAT')
            ->setCellValue('AB' . $header, 'SOURCE OF INCOME OF FATHER/GUARDIAN')
            ->setCellValue('AC' . $header, 'RECEIVED SCHOLARSHIP BEFORE')
            ->setCellValue('AD' . $header, 'STUDENT CNIC')
            ->setCellValue('AE' . $header, 'STUDENT MOBILE NO')
            ->setCellValue('AF' . $header, 'STUDENT WHATSAPP NO')
            ->setCellValue('AG' . $header, 'STUDENT EMAIL ADDRESS')
            ->setCellValue('AH' . $header, 'GOALS')
            ->setCellValue('AI' . $header, 'SUGGESTION')
            ->setCellValue('AJ' . $header, 'YOUR CONTRIBUTION')
            ->setCellValue('AK' . $header, 'INTERNATIONAL SCHOLARSHIP')
            ->setCellValue('AL' . $header, 'STANDARDIZED TEST')
            ->setCellValue('AM' . $header, 'ENGLISH ABILITY TEST')
            ->setCellValue('AN' . $header, 'SHARE ANY')
            ->setCellValue('AO' . $header, 'STATUS');

        $spreadsheet->getActiveSheet()->getStyle('H')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('J')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('K')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('L')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('M')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);


        foreach ($students as $key => $student) {
            $key += 5;
            $sheet
                ->setCellValue('A' . $key, $student->student_id)
                ->setCellValue('B' . $key, $student->getUser->full_name ?? '')
                ->setCellValue('C' . $key, $student->year)
                ->setCellValue('D' . $key, $student->matric_board)
                ->setCellValue('E' . $key, $student->group)
                ->setCellValue('F' . $key, $student->marks_in_matric)
                ->setCellValue('G' . $key, $student->current_city)
                ->setCellValue('H' . $key, $student->beneficary_name)
                ->setCellValue('I' . $key, $student->beneficary_iban_number)
                ->setCellValue('J' . $key, $student->beneficary_bank)
                ->setCellValue('K' . $key, $student->beneficary_cnic)
                ->setCellValue('L' . $key, $student->beneficary_bank_address)
                ->setCellValue('M' . $key, $student->name_of_college)
                ->setCellValue('N' . $key, $student->postal_address_of_college)
                ->setCellValue('O' . $key, $student->telephone_of_college)
                ->setCellValue('P' . $key, $student->principal_name)
                ->setCellValue('Q' . $key, $student->principal_number)
                ->setCellValue('R' . $key, $student->college_email)
                ->setCellValue('S' . $key, $student->teacher_name1)
                ->setCellValue('T' . $key, $student->teach_cell_no1)
                ->setCellValue('U' . $key, $student->teacher_address1)
                ->setCellValue('V' . $key, $student->teacher_name2)
                ->setCellValue('W' . $key, $student->teach_cell_no2)
                ->setCellValue('X' . $key, $student->teacher_address2)
                ->setCellValue('Y' . $key, $student->family_members)
                ->setCellValue('Z' . $key, $student->monthly_income)
                ->setCellValue('AA' . $key, $student->home_in_sqr_yards)
                ->setCellValue('AB' . $key, $student->source_of_income)
                ->setCellValue('AC' . $key, $student->any_scholarship)
                ->setCellValue('AD' . $key, $student->cnic_number)
                ->setCellValue('AE' . $key, $student->mobile_number)
                ->setCellValue('AF' . $key, $student->whatsapp_number)
                ->setCellValue('AG' . $key, $student->email_address)
                ->setCellValue('AH' . $key, $student->goals)
                ->setCellValue('AI' . $key, $student->suggestion)
                ->setCellValue('AJ' . $key, $student->your_contribution)
                ->setCellValue('AK' . $key, $student->international_scolarship)
                ->setCellValue('AL' . $key, $student->standarized_test)
                ->setCellValue('AM' . $key, $student->english_ability_test)
                ->setCellValue('AN' . $key, $student->share_any)
                ->setCellValue('AO' . $key, $student->status);

        }

        if (!File::isDirectory(getAbsolutePath() . '/excels')) {
            File::makeDirectory(getAbsolutePath() . '/excels', 0777, true, true);
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('./excels/students_applied_scholarships.xlsx');
        return response()->json('/excels/students_applied_scholarships.xlsx', 200);
    }

    public function claimForScholarship()
    {
        $students = ClaimScholarShip::with('getUser')->latest()->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $currentDate = Carbon::now()->isoFormat('lll');
        $spreadsheet->getActiveSheet()->mergeCells('A1:AB1')->getCell('A1')->setValue("DALDA FOUNDATION");
        $spreadsheet->getActiveSheet()->mergeCells('A2:AB2')->getCell('A2')->setValue("CLAIMED STUDENTS SCHOLARSHIPS");
        $spreadsheet->getActiveSheet()->mergeCells('A3:AB3')->getCell('A3')->setValue('Report Date: ' . $currentDate);

        $spreadsheet->getActiveSheet()->getStyle('A1:AB1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A1:AB1')->getFont()
            ->setSize(18)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:AB1')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(30);

        $spreadsheet->getActiveSheet()->getStyle('A2:AB2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A2:AB2')->getFont()
            ->setSize(15)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A2:AB2')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A3:AB3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A3:AB3')->getFont()
            ->setSize(12)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

        $spreadsheet->getActiveSheet()->getStyle('A3:AB3')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getRowDimension(3)->setRowHeight(18);

        $header = 4;

        $spreadsheet->getActiveSheet()->getStyle('A' . $header . ':AB' . $header)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EBEBEB');
        $spreadsheet->getActiveSheet()->getStyle('A' . $header . ':AB' . $header)->getFont()->setBold(true);

        foreach (range('A', 'AB') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $sheet
            ->setCellValue('A' . $header, 'STUDENT ID')
            ->setCellValue('B' . $header, 'STUDENT NAME')
            ->setCellValue('C' . $header, 'BOARD OF INTERMEDIATE')
            ->setCellValue('D' . $header, 'MARKS IN XI')
            ->setCellValue('E' . $header, 'MARKS IN XII')
            ->setCellValue('F' . $header, 'MARKS IN BACHELOR YEAR I')
            ->setCellValue('G' . $header, 'MARKS IN BACHELOR YEAR III')
            ->setCellValue('H' . $header, 'MARKS IN BACHELOR YEAR II')
            ->setCellValue('I' . $header, 'MARKS IN BACHELOR YEAR IV')
            ->setCellValue('J' . $header, 'MARKS IN BACHELOR YEAR V')
            ->setCellValue('K' . $header, 'DEGREE')
            ->setCellValue('L' . $header, 'CURRENT CITY')
            ->setCellValue('M' . $header, 'BENEFICARY NAME')
            ->setCellValue('N' . $header, 'BENEFICARY IBAN NUMBER')
            ->setCellValue('O' . $header, 'BENEFICARY BANK')
            ->setCellValue('P' . $header, 'BENEFICARY CNIC')
            ->setCellValue('Q' . $header, 'STUDENT CNIC')
            ->setCellValue('R' . $header, 'STUDENT MOBILE NO')
            ->setCellValue('S' . $header, 'STUDENT WHATSAPP NO')
            ->setCellValue('T' . $header, 'STUDENT EMAIL ADDRESS')
            ->setCellValue('U' . $header, 'GOALS')
            ->setCellValue('V' . $header, 'SUGGESTION')
            ->setCellValue('W' . $header, 'YOUR CONTRIBUTION')
            ->setCellValue('X' . $header, 'INTERNATIONAL SCHOLARSHIP')
            ->setCellValue('Y' . $header, 'STANDARDIZED TEST')
            ->setCellValue('Z' . $header, 'ENGLISH ABILITY TEST')
            ->setCellValue('AA' . $header, 'SHARE ANY ')
            ->setCellValue('AB' . $header, 'STATUS');

        $spreadsheet->getActiveSheet()->getStyle('N')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('P')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('Q')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('R')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $spreadsheet->getActiveSheet()->getStyle('S')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);


        foreach ($students as $key => $student) {
            $key += 5;

            $sheet
                ->setCellValue('A' . $key, $student->student_id)
                ->setCellValue('B' . $key, $student->getUser->full_name ?? '')
                ->setCellValue('C' . $key, $student->board_intermediate)
                ->setCellValue('D' . $key, $student->marks_in_xi)
                ->setCellValue('E' . $key, $student->marks_in_xii)
                ->setCellValue('F' . $key, $student->marks_in_bachelor_one)
                ->setCellValue('G' . $key, $student->marks_in_bachelor_two)
                ->setCellValue('H' . $key, $student->marks_in_bachelor_three)
                ->setCellValue('I' . $key, $student->marks_in_bachelor_four)
                ->setCellValue('J' . $key, $student->marks_in_bachelor_five)
                ->setCellValue('K' . $key, $student->degree_name)
                ->setCellValue('L' . $key, $student->current_city)
                ->setCellValue('M' . $key, $student->beneficary_name)
                ->setCellValue('N' . $key, $student->beneficary_iban_number)
                ->setCellValue('O' . $key, $student->beneficary_bank)
                ->setCellValue('P' . $key, $student->beneficary_cnic)
                ->setCellValue('Q' . $key, $student->cnic_number)
                ->setCellValue('R' . $key, $student->mobile_number)
                ->setCellValue('S' . $key, $student->whatsapp_number)
                ->setCellValue('T' . $key, $student->email_address)
                ->setCellValue('U' . $key, $student->goals)
                ->setCellValue('V' . $key, $student->suggestion)
                ->setCellValue('W' . $key, $student->your_contribution)
                ->setCellValue('X' . $key, $student->international_scolarship)
                ->setCellValue('Y' . $key, $student->standarized_test)
                ->setCellValue('Z' . $key, $student->english_ability_test)
                ->setCellValue('AA' . $key, $student->share_any)
                ->setCellValue('AB' . $key, $student->status);
        }

        if (!File::isDirectory(getAbsolutePath() . '/excels')) {
            File::makeDirectory(getAbsolutePath() . '/excels', 0777, true, true);
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('./excels/students_claimed_scholarships.xlsx');
        return response()->json('/excels/students_claimed_scholarships.xlsx', 200);
    }
}
