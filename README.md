

# EAN-14 Code Generator
A simple class to generate EAN-14 (GTIN-14)

### Introduction
You just found a simple class to create EAN-14 codes.

![enter image description here](https://github.com/waldekgraban/ean-14-generator/blob/main/EAN-14%20Code%20Generator.png?raw=true)


### How it's working - step by step

To create a new correct code in the GTIN-14 standard, it is enough to create an object of the **EanGenerator** class and call the `getCode()` method on it.

    $ean =  new  EanGenerator();
    echo $ean->getCode();

That's all.

Attention,
The `getCode()` method returns a valid, unique EAN-14 code every second as a string.
