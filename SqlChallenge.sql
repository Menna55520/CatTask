-- 1st way
SELECT product_id , product_name
FROM product
WHERE is_low_fat  AND is_recyclable  ;


-- 2nd way
SELECT product_id , product_name
FROM product
WHERE is_low_fat = true  AND is_recyclable = true  ;

-- 3rd way
SELECT product_id , product_name
FROM product
WHERE is_low_fat is true  AND is_recyclable is true  ;