<?php

    namespace App\Http\View;

    use App\Facade\TenderRepository;
    use Illuminate\View\View;

    class TenderComposer
    {
        public function compose(View $view)
        {
            return $view->with('tenders', TenderRepository::getTenders());
        }
    }
