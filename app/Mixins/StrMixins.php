<?php


    namespace App\Mixins;


    use Illuminate\Support\Str;

    class StrMixins
    {
        public function referenceNumber()
        {
            return function () {
                $reference = Str::random(8);
                return Str::upper('TN-' . substr($reference, 0, 3) . '-' . substr($reference, 3) . '-UB');
            };
        }
    }
