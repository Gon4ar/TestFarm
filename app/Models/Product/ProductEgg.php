<?

namespace App\Models\Product;

use App\Enum\Measure;
use LogicException;

class ProductEgg implements AnimalProductInterface
{
    private Measure $measure;

    private int $quantity;

    public function __construct()
    {
        $this->measure = Measure::Item;
        $this->quantity = 0;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function add(AnimalProductInterface $animalProduct): self
    {
        if (!$animalProduct instanceof ProductEgg) {
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