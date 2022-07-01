<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{asset('/css/app.css')}}">
    
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://flowbite.com/application-ui/demo/app.css">
<link rel="apple-touch-icon" sizes="180x180" href="https://flowbite.com/application-ui/demo/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://flowbite.com/application-ui/demo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://flowbite.com/application-ui/demo/favicon-16x16.png">
<link rel="icon" type="image/png" href="https://flowbite.com/application-ui/demo/favicon.ico">
<link rel="manifest" href="https://flowbite.com/application-ui/demo/site.webmanifest">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>
<body>








<div id="defaultModal" tabindex="-1" aria-hidden="true" 
    class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center" 
    style="width: 100%;">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    $groupActuelle->nom
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            
            <div class="inline-flex rounded-md shadow-sm" role="group" style="width: 100%;">
                <button type="button" style="width: 33.26%;text-align: center;" class="inline-flex items-center py-2 px-16 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    Les membres
                </button>
                <button type="button" style="width: 33.26%;text-align: center;" class="inline-flex items-center py-2 px-16 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    Les Info
                </button>
                <button type="button" style="width: 33.26%;text-align: center;" class="inline-flex items-center py-2 px-16 text-sm font-medium text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    Les invitation
                </button>
            </div>
        </div>
        <div class="VPGGthdu3cy_ZP7AL7dt TK9h2c2b79uBgR_cJzCE u0Aizb1ol0gBXDISYKJM" style="width: 100%;overflow-x: auto;">
            <div class="wBVMFkIGfrKshbvi2gS1 mngKhi_Rv06PF57lblDI">
                <table class="TK9h2c2b79uBgR_cJzCE Zy1Pypi71Xu6guex6urN NIAblPiyeuYQ0zW671xb tE23eyc5jfeQpiPRybcw PoeKYEQfG4WfmL9xM6vu">
                    <thead class="_9dH7mrOkzM4RTmidHTs jqg6J89cvxmDiFpnV56r">
                        <tr>
                            
                            <th scope="col" class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf XIIs8ZOri3wm8Wnj9N_y">
                                Name
                            </th>
                            <th scope="col" class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf XIIs8ZOri3wm8Wnj9N_y">
                                Position
                            </th>
                            <th scope="col" class="_wYiJGbRZyFZeCc8y7Sf gMXmdpOPfqG_3CKkL0VD ezMFUVl744lvw6ht0lFe upQp7iWehfaU8VTbfx_w PeR2JZ9BZHYIH8Ea3F36 sdSaZcRa4_We5kKaX4pf XIIs8ZOri3wm8Wnj9N_y">
                                Status
                            </th>
                            <th scope="col" class="_wYiJGbRZyFZeCc8y7Sf">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="_Ybd3WwuTVljUT4vEaM3 Zy1Pypi71Xu6guex6urN NIAblPiyeuYQ0zW671xb _1jTZ8KXRZul60S6czNi XpuPpk9eXhVCrleKmXDr">
                        
                        <tr class="_7KA5gD55t2lxf9Jkj20 OPrb_iG5WDy_7F05BDOX">
                            
                            <td class="YRrCJSr_j5nopfm4duUc Q_jg_EPdNf9eDMn1mLI2 _wYiJGbRZyFZeCc8y7Sf a6oNxeE2_RMYuJ3ruA_U e2hrZSYddULUFUtJ9wBR BHrWGjM1Iab_fAz0_91H bqENLAd5lw7DYVe46RFH">
                                <img class="hlT3pgfpx11BUFMWNdhc Mln3CkDzLcoVQAC3Uqsd RpVwy4sO7Asb86CncKJ_" src="https://flowbite.com/application-ui/demo/images/users/neil-sims.png" alt="Neil Sims avatar">
                                <div class="c8dCx6gnV43hTOLV6ks5 _43MO1gcdi2Y0RJW1uHL PeR2JZ9BZHYIH8Ea3F36 XIIs8ZOri3wm8Wnj9N_y">
                                    <div class="d3C8uAdJKNl1jzfE9ynq yM_AorRf2jSON3pDsdrz __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">oualid lachgar</div>
                                    <div class="c8dCx6gnV43hTOLV6ks5 _43MO1gcdi2Y0RJW1uHL PeR2JZ9BZHYIH8Ea3F36 XIIs8ZOri3wm8Wnj9N_y">oualidlachgar7@gmail.com</div>
                                </div>
                            </td>
                            <td class="_wYiJGbRZyFZeCc8y7Sf d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl BHrWGjM1Iab_fAz0_91H OyABRrnTV_kvHV7dJ0uE">Front-end developer</td>
                            <td class="_wYiJGbRZyFZeCc8y7Sf d3C8uAdJKNl1jzfE9ynq _43MO1gcdi2Y0RJW1uHL __9sbu0yrzdhGIkLWNXl BHrWGjM1Iab_fAz0_91H OyABRrnTV_kvHV7dJ0uE">
                                <div class="YRrCJSr_j5nopfm4duUc Q_jg_EPdNf9eDMn1mLI2">
                                     <div class="LBw_xNY6RemSb6arrxbk ZCcDCx3VW8mhFqKa8r5J RpVwy4sO7Asb86CncKJ_ _8jNXfz935bbH_fAUIpN fhCwost7CSNRc2WSHLFW"></div>  Active
                                </div>
                            </td>
                            <td class="_wYiJGbRZyFZeCc8y7Sf EU43bH15DCmsqkGyVBGj BHrWGjM1Iab_fAz0_91H">
                                <button type="button" data-modal-toggle="delete-user-modal" class="_k0lTW0vvzboctTxDi2R Q_jg_EPdNf9eDMn1mLI2 _Cj_M6jt2eLjDgkBBNgI b9aD6g2qw84oyZNsMO8j c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe ijrOHNoSVGATsWYKl4Id y6GKdvUrd7vp_pxsFb57 SdPDrbResNmgnA0L4Iki mveJTCIb2WII7J4sY22F _hwGprpWFg861uOaLs98 _dylIDxYTN3qgvD4U597 wGCv_lBIef6dPW_LgqPQ g0psQAXAFirvUBcDyMSb">
                                    <svg class="ADSeKHR1DvUUA48Chci_ rxe6apEJoEk8r75xaVNG fhCwost7CSNRc2WSHLFW" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>