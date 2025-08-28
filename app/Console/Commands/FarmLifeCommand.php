<?php

namespace App\Console\Commands;

use App\Models\Animal\Chicken;
use App\Models\Animal\Cow;
use App\Service\AnimalType\AnimalTypePool;
use App\Service\Factory\AnimalFactory;
use App\Service\Factory\FarmFactory;
use App\Service\Print\FarmPrint;
use Illuminate\Console\Command;

class FarmLifeCommand extends Command
{
    public function __construct(
        private readonly AnimalFactory $animalFactory,
        private readonly FarmFactory $farmFactory,
        private readonly FarmPrint $farmPrint,
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farm:life';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running farm';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Начало симуляции фермы.\n");

        $farm = $this->farmFactory->createFarm();

        $this->info("Первоначальное добавление животных...");
        for($i = 1; $i <= 10; $i++) {
            $cow = $this->animalFactory->createAnimalByIdentifier(Cow::class, "cow{$i}");
            $farm->addAnimal($cow);
        }
        
        for($i = 1; $i <= 20; $i++) {
            $chicken = $this->animalFactory->createAnimalByIdentifier(Chicken::class, "chicken{$i}");
            $farm->addAnimal($chicken);
        }

        $this->info($this->farmPrint->printFarmAnimals($farm));

        $this->info('Сбор продуктов в течении недели...');
        $products = $farm->gatherAnimalProduct(7);
        $this->info($this->farmPrint->printProducts($products));

        $this->info("Повторное добавление животных...");
        for($i = 11; $i <= 11; $i++) {
            $cow = $this->animalFactory->createAnimalByIdentifier(Cow::class, "cow{$i}");
            $farm->addAnimal($cow);
        }
        
        for($i = 21; $i <= 25; $i++) {
            $chicken = $this->animalFactory->createAnimalByIdentifier(Chicken::class, "chicken{$i}");
            $farm->addAnimal($chicken);
        }

        $this->info($this->farmPrint->printFarmAnimals($farm));

        $this->info('Сбор продуктов в течении недели...');
        $products = $farm->gatherAnimalProduct(7);
        $this->info($this->farmPrint->printProducts($products));


        return Command::SUCCESS;
    }
}
