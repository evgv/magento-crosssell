# Simple CrossSell Magento Extension 

Uses core `Mage_Catalog` extension and depend from it.
Retrieve crosssell products without depends from quote and set custom collection items limit.
Add crosssell products block in `product.info` block at `catalog_product_view` section.

######For call this block need:

in template `../catalog/product/view.phtml` add `<?php echo $this->getChildHtml('crosssell') ?>`
