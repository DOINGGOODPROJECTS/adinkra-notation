<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubmissionsImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    private $importedCount = 0;
    private $skippedCount = 0;

    public function model(array $row)
    {
        // dd($row);
        $data = $this->prepareData($row);
        $data['birthday'] = Carbon::parse($data['birthday'])->format('Y-m-d');
        // dd($data);

        // Valider manuellement
        $validator = Validator::make($data, $this->rules(), $this->customValidationMessages());

        if ($validator->fails()) {
            $this->skippedCount++;
            Log::warning('Import validation failed', [
                'row' => $row,
                'errors' => $validator->errors()->all()
            ]);
            return null;
        }

        $this->importedCount++;        
        return new Submission($data);
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::unique('submissions', 'email')->whereNull('deleted_at')],
            'fullname' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'nationality'  => 'required',
            'country'  => 'required',
            'occupation'  => 'required',
            'team_count'  => 'required',
            'leadership_skills' => 'required',
            'realisations' => 'required',
            'community_impact' => 'required',
            'leadership_challenge' => 'required',
            'contribution' => 'required',
            'expected_from_adinkra' => 'required',
            'leadership_award' => 'required',
            'biography' => 'required', 
            'motivation_video' => 'required',
            'cv' => 'required',
            'photo' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'email.unique' => 'Cet email (:input) existe déjà dans notre système.',
            '*.required' => 'Le champ :attribute est obligatoire.',
        ];
    }

    private function prepareData(array $row): array
    {
        // Normalisation des en-têtes (suppression des espaces et :)
        $normalizedRow = [];
        foreach ($row as $key => $value) {
            $normalizedKey = Str::lower(trim(str_replace(':', '', $key)));
            $normalizedRow[$normalizedKey] = $value;
        }


        return [
            'fullname' => $this->getValue($normalizedRow, ['nom_complet', 'full_name']),
            'birthday' => $this->getValue($normalizedRow, ['date_de_naissance', 'date_of_birth']),
            'nationality' => $this->getValue($normalizedRow, ['nationalite', 'nationality']),
            'country' => $this->getValue($normalizedRow, ['pays_de_residence_actuel', 'current_country_of_residence']),
            'address' => $this->getValue($normalizedRow, ['adresse', 'address']),
            'email' => Str::lower(trim($this->getValue($normalizedRow, ['adresse_email', 'email_address']))),
            'phone' => $this->getValue($normalizedRow, ['numero_de_telephone_whatsapp_telegram_de_preference', 'phone_number_whatsapptelegram_preferably']),
            'award_category' => $this->getValue($normalizedRow, ['categorie_de_distinction', 'award_category']),
            'occupation' => $this->getValue($normalizedRow, ['fonction_actuelle_titre_professionnel', 'current_titleoccupation']),
            'organization' => $this->getValue($normalizedRow, ['nom_de_lorganisation_le_cas_echeant', 'organization_name_if_applicable']) ?? null,
            'organization_website' => $this->getValue($normalizedRow, ['site_web_de_lorganisation_le_cas_echeant', 'organization_website_if_applicable']) ?? null,
            'personnal_website' => $this->getValue($normalizedRow, ['site_web_personnel_le_cas_echeant', 'personal_website_if_applicable']) ?? null,
            'team_count' => $this->getValue($normalizedRow, ['nombre_de_personnes_dans_votre_equipe_ou_demployes', 'number_of_employees_or_people_on_your_team']),
            'organization_presentation' => $this->getValue($normalizedRow, ['presentation_de_lorganisation_750_caracteres_max', 'organization_description_750_characters_max']),
            'leadership_skills' => $this->getValue($normalizedRow, ['experience_en_leadership', 'leadership_skills']),
            'realisations' => $this->getValue($normalizedRow, ['resume_de_vos_realisations_750_caracteres_max', 'summary_of_achievements_750_characters_max']),
            'community_impact' => $this->getValue($normalizedRow, ['impact_communautaire_500_caracteres_max', 'community_impact_500_characters_max']),
            'leadership_challenge' => $this->getValue($normalizedRow, ['quel_defi_de_leadership_avez_vous_surmonte_et_quavez_vous_appris_750_caracteres_max', 'what_is_one_leadership_challenge_you_have_overcome_and_what_did_you_learn_750_characters_max']),
            'contribution' => $this->getValue($normalizedRow, ['contribution_aux_liens_afrique_diaspora_750_caracteres_max', 'contribution_to_africa_diaspora_ties_750_characters_max']),
            'expected_from_adinkra' => $this->getValue($normalizedRow, ['quattendez_vous_du_reseau_adinkra_500_caracteres_max', 'what_are_your_expectations_of_the_adinkra_network_500_characters_max']),
            'leadership_award' => $this->getValue($normalizedRow, ['prix_programmes_de_bourses_ou_de_leadership', 'award_scholarship_leadership_programme']),
            'biography' => $this->getValue($normalizedRow, ['biographie_courte_1000_caracteres_max', 'short_biography_1000_characters_max']),
            'motivation_video' => $this->getValue($normalizedRow, ['video_de_motivation', 'motivation_video_please_present_yourself_name_title_country_and_answer_the_following_questions']),
            'others_video_link' => $this->getValue($normalizedRow, ['autres_liens_video_optionnel', 'additional_video_links_optional']),
            'cv' => $this->getValue($normalizedRow, ['cv_max_3_pages']),
            'photo' => $this->getValue($normalizedRow, ['photo_portrait_professionnelle', 'professional_headshot_image']),
            'submit_at' => $this->getValue($normalizedRow, ['submit_date_utc']),
        ];
    }

    private function getValue(array $row, array $possibleKeys)
    {
        foreach ($possibleKeys as $key) {
            if (!empty($row[$key])) {
                return $this->cleanValue($row[$key]);
            }
        }
        return null;
    }

    private function cleanValue($value)
    {
        if (is_string($value)) {
            return trim(preg_replace('/\s+/', ' ', $value));
        }
        return $value;
    }

    public function getImportedCount(): int
    {
        return $this->importedCount;
    }

    public function getSkippedCount(): int
    {
        return $this->skippedCount;
    }

    public function getTotalCount(): int
    {
        return $this->importedCount + $this->skippedCount;
    }

    public function chunkSize(): int { return 500; }
}