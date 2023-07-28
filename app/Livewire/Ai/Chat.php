<?php

namespace App\Livewire\Ai;

use App\Livewire\Product\Product;
use Livewire\Component;
use OpenAI;
use Illuminate\Support\Str;

class Chat extends Component
{
    public $content, $text;
    public $receivedContent="324";
    public function render()
    {
        return view('livewire.ai.chat');
    }

    public function sendRequest()
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

        $this->receivedContent = "345435";  
        $this->content = "tourishm";
        // return response()->stream(function () {
        //     while (true) {
        //         $client = OpenAI::client('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');

        //         $result = $client->completions()->create([
        //             "model" => "text-davinci-003",
        //             "temperature" => 0.7,
        //             "top_p" => 1,
        //             "frequency_penalty" => 0,
        //             "presence_penalty" => 0,
        //             'max_tokens' => 100,
        //             'prompt' => sprintf('Write article about: %s', $this->text),
        //         ]);

        //        echo trim($result['choices'][0]['text']);
        //         ob_flush();
        //         flush();

        //         // Break the loop if the client aborted the connection (closed the page)
        //         if (connection_aborted()) {
        //             break;
        //         }
        //         usleep(50000); // 50ms
        //         //return ($this->content);
        //     }
        // }, 200, [
        //     'Cache-Control' => 'no-cache',
        //     'Content-Type' => 'text/event-stream',
        // ]);
        $client = OpenAI::client('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');

        return response()->stream(function () use ($client) {
            $stream = $client->chat()->createStreamed([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $this->content],
                ],
                "frequency_penalty" => 0,
                "presence_penalty" => 0,
                'max_tokens' => 100,
                'temperature'=>0.7,
                
            ]);
            foreach ($stream as $response) {
                if (isset($response['choices'][0]['delta']['content'])) {
                    $message = $response['choices'][0]['delta']['content'];
                    echo PHP_EOL;
                    echo 'data: ' . $message ;
                    echo "\n\n";
                    ob_flush();
                    flush();
                    usleep(5000);
                }
                if (connection_aborted()) {
                    break;
                }
            }
            echo 'data: ' . '[DONE]' ;
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

    public function updated($name, $value)
    {
        dd("yes");
        if($name=='receivedContent') {
            $this->receivedContent = $value;
        }
    }
}
