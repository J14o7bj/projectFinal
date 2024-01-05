<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ</title>
    <?php include('../link.php'); ?>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>

<body>
    <div class="container-expand">
        <div class="container-fluid header-admin">
            <div class="row">
                <div class="col">
                    <div class="head1">CAFE</div>
                </div>
                <div class="col">
                    <div class="rightcenter">
                        <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img width="36" height="36"
                                src="https://s3-alpha-sig.figma.com/img/b383/00e0/345d045851189cc6ff094b67026fea9d?Expires=1705276800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=PCqveWZdaFuH~UWxSGfhcFTs53hpRKHtmG6J9nZ9p1RpDdIRdg9rXKpXDucKRLl8k7waygQ9rnY-Hu5EMC4u4K5ujWRT6FwHeqW-s7f7ovgApz3JJhznJfuKWbDvA2G3z-R1fI6JrAsvjkQCiWUPamjkqEAyZesfXEW1wVuR1w~S9fXDnOfWDQRxL-Bgc-go0Xk7a17S58dzY8enRvH8I6Kia5BEMpwKFcrUEg-bwhgMW7G71~fKX7KulvlRw8zQC-pbMGvNyH8Y59L9vbV7gKuXCeS61o3BNP-ad70EDd~f2chNeUp9XM3h-EbfreJGUwOYKOO6DHWoSgbtHfnYxA__">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Flexbox container for tabs and content -->
    <div class="containers">

        <!-- Vertical tab container -->
        <div class="menubar">
            <div class="tab">
                <button class="tablinks" onclick="openPage(event, 'Order')">
                    <img width="36" height="36"
                        src="https://s3-alpha-sig.figma.com/img/1ebe/74a9/111b06fc0dc7a4b7eefa077264912085?Expires=1705276800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=SR53IrDTuKSVlsL4VesZ86rK4P4jREzEpxjk~q3-PPaNOdo4akGACa1AQDb~b9tABBVTxAmESU~jaD-yLM6b6V2nVxh6ynNDAAqJqxOr7D-JadkZPt6CwfMmBxu8R4~UfEfltEAa5RCJaH7Zw6VyfgCDGbm9DmMtjw4nI3oSnWtgzVEdHMun~bkVreFuKs6wEuRVynpMMWAN2a8nK3RI2JnedMDN-hP0NI05eecY9q5GfSQZmRMhehlbTtl7yJEF9VnRoBcJ6o4l5TVhplOECzFGfXwkEr1uXoT6Q3sz3M3JILktrQas2JFoYmodXnNbdkFEut-z5OM8qNIw~M2tzw__"></button>
                <button class="tablinks" onclick="openPage(event, 'Stock')">
                    <img width="36" height="36"
                        src="https://s3-alpha-sig.figma.com/img/1ffa/0cc1/4111ff6cf6b0aa640c29226fc5f188f8?Expires=1705276800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=EeO73EfRQP2ceSOa1R2MEco7AWBgZKTdT3LA8OMjzSf01HNKKlQwHCkwllF6owFzjoFDeNt~kuPZ~soZ4pbCZ384lBCP9CvnWGYGsU6n2GAd3E5JZusaH5jF8AE0SojvR~~pqLIUBTTYmGuIHRTsD-JP0QsnSyZD5AKvCCRZXlHa6WYr2PBLG~wb7Pm123qqfarBOAO2s5vxrItGvcQCNQUETZslpjFi-cZpXLpBsKo~5j5lZLb7iEusJ6FoUquKKw2LMX4mgoB2Fw7N0oIl7zqWWClG4rQQKYn7ooS9RdCercUovqCnES7AI6G9mdAqLKbJoyXSyrehRJBC5sLWow__"></button>
                </button>
                <button class="tablinks" onclick="openPage(event, 'History')">
                    <img width="36" height="36"
                        src="https://s3-alpha-sig.figma.com/img/b2b5/0744/fb2216077f6b713aa28ab7c682b44962?Expires=1705276800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bNl7XoBbEJQCl25fNMclEvQ8-pTQQEWPoB~VD4dfxgExeFF1pZOdQcvWfOFQDLBgCsxH2jbj2oYJhL6ty9nQNcVP~PVQbR6JOLWf84JpBWKE4WAyXUYSqvN8Lx1jqGrKEeF1f~XGnF~-wCCzyDQfBuQPlbjcTEEXY2nrwfM~iM0YQt1RJdCI~WNHQuOJ9Zzx0JzYFjWdSc3j2nk0V9nhd-JXTTY4IJoDwCGiBMMBw7ZOvy6u0OXzAIw3Qu-t8SJAhle9Ak3SjpR5ZtCVlZhuGWK014ozSHjVpQTFuLubZ9acAd~pV8k-lUL7uTMkC5HUv35iII~7a4thi8hW-4hiug__"></button>
            </div>
        </div>


        <div class="content">


            <div id="Order" class="tabcontent">
                <div class="container area-body">
                    <div class="headertab">คำสั่งซื้อ</div>
                    <div class="card-order-lg">
                        <div class="row">
                            <div class="col">
                                <div class="headtable">โต๊ะ</div>
                            </div>
                            <div class="col text-end">
                                <div class="headtable">1</div>
                            </div>
                            <div class="center card-order-sm">


                                <div class="row">
                                    <div class="col-9">
                                        <div class="text-order-name">Strawbery Frappe</div>
                                    </div>
                                    <div class="col">
                                        <div class="text-order-quality">x10</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <div class="text-order-name">Strawbery Frappe</div>
                                        <div class="text-order-option">- Low sugar</div>
                                    </div>
                                    <div class="col">
                                        <div class="text-order-quality">x1</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="text-price">ราคา</div>
                                </div>
                                <div class="col-2">
                                    <div class="text-price">100</div>
                                </div>
                                <div class="col-2">
                                    <div class="text-price">B</div>
                                </div>
                                <div class="col text-end">
                                    <button class="button-green"><img width="32" height="32"
                                            src="https://s3-alpha-sig.figma.com/img/a1d9/bf01/64cd71f67ee416d21c3c2bb2ad714edc?Expires=1705276800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=D-FLqmSH7hKPWjuBV3XhnrCZdMKlynyQxjZn8vzMehFrQRqsTE73C~i5kiz2WDqeBrFbeE-P0A6bGwSVpZC3j-vYxRvn9G7dzsIZBYViX-p4yKqKZOkZ-CmxznJqrqh~~EgOCTKvBah0aMB-RzwYPxUJZHT39CGfZJWx17~RoNO-5yJcI9qRMsHZSbtbWl2lxlqnkaXTauIJ6TqkS3BMaZgP-JFoRVUT699WzIlQVC9-DjtSU8DAd2~iHkBpqYlG0XU5JOsGwCnU8owVKaAl4H-8xmGCLu2SCOItp0NdoW3IYU44i2SXJCc~4LqhMObbHB1WC64xf3NtjzWEiiFyQg__"></button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div id="Stock" class="tabcontent">
                <div class="container area-body">
                    <div class="headertab">คลังสินค้า</div>

                    <div class="container">
                        <div class="card-section">
                            <div class="card-column">
                                <!-- <one> -->
                                <div class="row">
                                    <button class="card-type">
                                        <div class="text-type-name">Frappe</div>
                                    </button>
                                    <button class="add-card-type">
                                        <div class="add-text-type-name">+ เพิ่มประเภท</div>
                                    </button>
                                </div>

                                <!-- <two> -->
                                <div class="card-list">
                                    <table>
                                        <tr class="table-row">
                                            <td>
                                                <div class="row row-center">

                                                    <div class="col">
                                                        <div class="image-box"><img src="../img/inumaki.png"></div>
                                                    </div>
                                                    <div class="col">
                                                        CupCake
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                520 B
                                            </td>
                                            <td>
                                            <button class="button-green">
                                                    <div class="text-type-name">แก้ไข</div>
                                                </button>    
                                            <button class="button-yellow">
                                                    <div class="text-type-name">คงเหลือ</div>
                                                </button>
                                                <button class="button-red">
                                                    <div class="text-type-name">ลบ</div>
                                                </button>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                </div>
            </div>


            <div id="History" class="tabcontent">
                <div class="container area-body">
                    <div class="headertab">ประวัติคำสั่งซื้อ</div>
                    <div class="card-order-lg">
                        <div class="row">
                            <div class="col">
                                <div class="headtable">โต๊ะ</div>
                            </div>
                            <div class="col text-end">
                                <div class="headtable">1</div>
                            </div>
                            <div class="center card-order-sm">


                                <div class="row">
                                    <div class="col-9">
                                        <div class="text-order-name">Strawberry Frappe</div>
                                    </div>
                                    <div class="col">
                                        <div class="text-order-quality">x10</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <div class="text-order-name">Strawberry Frappe</div>
                                        <div class="text-order-option">- Low sugar</div>
                                    </div>
                                    <div class="col">
                                        <div class="text-order-quality">x1</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="text-price">ราคา</div>
                                </div>
                                <div class="col-2">
                                    <div class="text-price">100</div>
                                </div>
                                <div class="col-2">
                                    <div class="text-price">B</div>
                                </div>
                                <div class="col text-end">
                                    <button class="button-red"><img width="32" height="32"
                                            src="https://s3-alpha-sig.figma.com/img/76e8/5f25/e544c53acb6faeb98eceef084bfe1c35?Expires=1705276800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=XMWlSv7KIUxe0NUEb0w4AGVEjzutZh54W9TYPVDMyzGlwxfzajtfQiqX9a0088q8tj5KZvcH0U7ur0wQ66Jxj6ZndJ6AmrAaSfa6kAmIWNAFkcSwqszNN1~7iDtqMNRLwoiVLS1KvFo3tE5IvkmpHUjp7YcuIIqvNcwnaTe1jY9a0hOTdBimMaUTg4~43XZaYoZVJyvohxo-bbKI0fbKSPMjOlLkSb~tM~8CZizQlzpmx-y~pG2wKUbXsQUHLflWDlxyVwbNbvnmZzJ2cA8ls3Fduy6~ycLAe6Tf3iwHyeTDSJQFClAzh3BE6pTnGkq8TvCNmkTYtD5aDqfmoQTHKQ__"></button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function openPage(evt, menu) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(menu).style.display = "block";
            evt.currentTarget.className += " active";

        }
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector('.tab button.tablinks:first-child').click();
        });
    </script>
</body>
<?php include('../script.php'); ?>

</html>