styleSheetCoventions

Datastructure
    default             general settings for pageElement
    page                spezific settings for each page, pageElements are wrapped in spezific divs
    styles              import of all settings

Colors
    set in default as variables
    use variables for colorValues for quick changes in colorComposition

Seletors
    over class
    default only one class per selector
        p,
        a{
            //properties
        }
    page/pageElement first spezific classname of each page then class
        shop.p,
        shop.a{
            
        }
        