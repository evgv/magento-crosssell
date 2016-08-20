<?php

class NoName_CrossSell_Block_Catalog_Product_View_Crosssell extends Mage_Checkout_Block_Cart_Crosssell
{
    protected $_maxItemCount = 10;
    
    /**
     * Get crosssell items
     *
     * @return array
     */
    public function getItems()
    {
        $items = $this->getData('items');
        if (is_null($items)) {
            $items = array();
                if (count($items) < $this->_maxItemCount) {
                    $filterProductIds = array_merge($this->_getCartProductIds(), $this->_getCartProductIdsRel());
                    $collection = $this->_getCollection()
                        ->addProductFilter($filterProductIds)
                        ->setPageSize($this->_maxItemCount-count($items))
                        ->setGroupBy()
                        ->setPositionOrder()
                        ->load();
                    foreach ($collection as $item) {
                        $items[] = $item;
                    }
                }
                
            $this->setData('items', $items);
        }
        return $items;
    }
}