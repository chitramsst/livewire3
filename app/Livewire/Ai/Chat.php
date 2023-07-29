<?php

namespace App\Livewire\Ai;

use App\Livewire\Product\Product;
use Livewire\Component;
use OpenAI;
use Illuminate\Support\Str;

class Chat extends Component
{
    public $content, $title;
    public function render()
    {
        return view('livewire.ai.chat');
    }
    public function sendRequest($msg)
    {
        // $result = $client->completions()->create([
        //     "model" => "text-davinci-003",
        //     "temperature" => 0.7,
        //     "top_p" => 1,
        //     "frequency_penalty" => 0,
        //     "presence_penalty" => 0,
        //     'max_tokens' => 500,
        //     'prompt' => sprintf('Write article about: %s', $this->text),
        // ]);

        // $this->content = trim($result['choices'][0]['text']);
        $this->content = base64_decode($msg);
        $client = OpenAI::client('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');
        return response()->stream(function () use ($client) {
            $stream = $client->chat()->createStreamed([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $this->content],
                ],
                'temperature' => 0.9,
                'max_tokens' => 50,
                'frequency_penalty' => 0,
                'presence_penalty' => 0.6,
            ]);
            foreach ($stream as $response) {
                $response->choices[0]->delta->content;
                if (isset($response->choices[0]->delta->content)) {
                    $message = $response->choices[0]->delta->content;
                    echo PHP_EOL;
                    echo 'data: {"content": "'.$message.'"}';
                    echo "\n\n";
                    ob_flush();
                    flush();
                    usleep(5000);
                }
                if (connection_aborted()) {
                    break;
                }
            }
            $test = '[DONE]';
            echo 'data: {"content": "' . $test . '"}';
            echo "\n\n";
            ob_flush();
            flush();
            usleep(50000);
        }, 200, [
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Content-Type' => 'text/event-stream',
        ]);
    }

}
