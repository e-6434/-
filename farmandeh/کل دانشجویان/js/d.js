class Cryptex {
    constructor(element) {
      this.element = element;
      this.blockElements = [];
      this.blocks = [];
      this.plusButtonElement;
      this.minusButtonElemen;
      this.create();
    }
    create() {
      this.blockElements = this.element.querySelectorAll(
        '[data-cryptex="block"]'
      );
      this.blockElements.forEach((blockElement) => {
        const block = new CryptexBlock(blockElement, this);
        this.blocks.push(block);
      });
    }
    logValue() {
      let value = [];
      this.blocks.forEach((block) => {
        value.push(block.getValue());
      });
      console.log(value);
    }
  }
  class CryptexBlock {
    constructor(element, parent) {
      this.element = element;
      this.parent = parent;
      this.value = 0;
      this.rotation = 0;
      this.numbersElement;
      this.buttonPlus;
      this.buttonMinus;
      this.create();
    }
    create() {
      this.numbersElement = this.element.querySelector(
        '[data-cryptex="numbers"]'
      );
      this.buttonPlus = this.element.querySelector(
        '[data-cryptex="button-plus"]'
      );
      this.buttonMinus = this.element.querySelector(
        '[data-cryptex="button-minus"]'
      );
      this.buttonPlus.addEventListener("click", () => {
        this.rotation -= 36;
        if (this.value === 9) {
          this.setValue(0);
        } else {
          this.setValue(this.value + 1);
        }
        this.animate(1);
      });
      this.buttonMinus.addEventListener("click", () => {
        this.rotation += 36;
        if (this.value === 0) {
          this.setValue(9);
        } else {
          this.setValue(this.value - 1);
        }
        this.animate(-1);
      });
    }
    getValue() {
      return this.value;
    }
    setValue(value) {
      this.value = value;
    }
    animate(direction) {
      this.parent.logValue();
      this.numbersElement.style.rotate = `x ${this.rotation}deg`;
    }
  }
  
  const cryptexElement = document.querySelector("[data-cryptex]");
  const cryptex = new Cryptex(cryptexElement);
  