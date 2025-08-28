<?

namespace App\Models\Product;

use App\Enum\Measure;
use LogicException;

class ProductMilk implements AnimalProductInterface
{
    private Measure $measure;

    private float $quantity;

    public function __construct()
    {
        $this->measure = Measure::Liter;
        $this->quantity = 0;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function add(AnimalProductInterface $animalProduct): self
    {
        if (!$animalProduct instanceof ProductMilk) {
            throw new LogicException('Invalid product add');
        }

        $this->quantity = $this->quantity + $animalProduct->getQuantity();

        return $this;
    }

    public function getMeasure(): Measure
    {
        return $this->measure;
    }
}