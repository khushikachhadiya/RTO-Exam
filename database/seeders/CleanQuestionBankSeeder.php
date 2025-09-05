<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CleanQuestionBankSeeder extends Seeder
{

    public function run(): void
    {

        $questions = DB::table('question_bank')->get();

        foreach ($questions as $q) {
            $cleanQuestion = preg_replace('/^\d+\.\s*/', '', $q->question);

            // Remove square brackets, quotes, and "A."
            $cleanAnswer = $q->answer;
            $cleanAnswer = str_replace(['[', ']', '"'], '', $cleanAnswer);
            $cleanAnswer = preg_replace('/^A\.\s*/', '', $cleanAnswer);
            $cleanAnswer = preg_replace('/^જ\.\s*/', '', $cleanAnswer);
            DB::table('question_bank')
                ->where('id', operator: $q->id)
                ->update([
                    'question' => trim($cleanQuestion),
                    'answer' => trim($cleanAnswer),
                ]);
        }

    }
}
