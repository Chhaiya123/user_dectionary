// app/Services/TranslateService.php

namespace App\Services;

use Google\Cloud\Translate\V2\TranslateClient;

class TranslateService
{
    protected $translateClient;

    public function __construct()
    {
        $this->translateClient = new TranslateClient([
            'projectId' => config('services.google.project_id'),
            'keyFilePath' => config('services.google.credentials'),
        ]);
    }

    public function translate($text, $targetLanguage)
    {
        $result = $this->translateClient->translate($text, [
            'target' => $targetLanguage,
        ]);

        return $result['text'];
    }
}