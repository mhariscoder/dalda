<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Dalda Foundation</title>
    <style>
        * {
            margin: 0 5;
            padding: 0;
            list-style: none outside none;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEz0dL_nz.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEzQdL_nz.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEzwdL_nz.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEzMdL_nz.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEz8dL_nz.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEz4dL_nz.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOiCnqEu92Fr1Mu51QrEzAdLw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc3CsTKlA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc-CsTKlA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc2CsTKlA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc5CsTKlA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc1CsTKlA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc0CsTKlA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TjASc6CsQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xFIzIFKw.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xMIzIFKw.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xEIzIFKw.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xLIzIFKw.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xHIzIFKw.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xGIzIFKw.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1Mu51xIIzI.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc3CsTKlA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc-CsTKlA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc2CsTKlA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc5CsTKlA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc1CsTKlA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc0CsTKlA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51S7ACc6CsQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic3CsTKlA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic-CsTKlA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic2CsTKlA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic5CsTKlA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic1CsTKlA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic0CsTKlA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TzBic6CsQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc3CsTKlA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc-CsTKlA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc2CsTKlA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc5CsTKlA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc1CsTKlA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc0CsTKlA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: italic;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOjCnqEu92Fr1Mu51TLBCc6CsQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxFIzIFKw.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxMIzIFKw.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxEIzIFKw.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxLIzIFKw.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxHIzIFKw.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxGIzIFKw.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 100;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOkCnqEu92Fr1MmgVxIIzI.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fCRc4EsA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fABc4EsA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fCBc4EsA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBxc4EsA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fCxc4EsA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fChc4EsA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBBc4.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu72xKOzY.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu5mxKOzY.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7mxKOzY.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4WxKOzY.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7WxKOzY.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxK.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fCRc4EsA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fABc4EsA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fCBc4EsA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBxc4EsA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fCxc4EsA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fChc4EsA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc4.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfCRc4EsA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfABc4EsA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfCBc4EsA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfBxc4EsA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfCxc4EsA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmWUlfBBc4.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfCRc4EsA.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfABc4EsA.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* greek-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfCBc4EsA.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }
        /* greek */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfBxc4EsA.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfCxc4EsA.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfChc4EsA.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmYUtfBBc4.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
</head>
<body>
<div
        style="
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        font-family: 'Roboto', sans-serif;
        padding-top: 10px;
      "
>
    <h1
            style="
          font-size: 14px;
          margin: 0 0 10px;
          font-weight: 900;
          text-transform: uppercase;
          text-align: center;
        "
    >
        DALDA FOUNDATION STUDENT SCHOLARSHIP FORM DETAILS
    </h1>

    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                1
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Student Name
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->getUser->full_name}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                2
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Beneficiary Name
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->beneficary_name}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                3
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Year
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->year}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                4
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Beneficiary's 24 Digits IBAN number
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->beneficary_iban_number}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                5
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Group
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="height: 20px;">
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->group}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                6
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Marks in Matric
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->marks_in_matric}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                7
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Current City Name
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->current_city}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                8
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Beneficiary Bank Name
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->beneficary_name}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                9
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Beneficiary's Bank Address
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->beneficary_bank_address}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <h1
            style="
          padding: 5px 0;
          margin-top: 10px;
          text-transform: uppercase;
          font-size: 8px;
          font-weight: 600;
        "
    >
        College Informaton
    </h1>
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                10
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Name Of College
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->name_of_college}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                11
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Postal Address Of College
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->postal_address_of_college}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td
                                width="25%"
                                style="vertical-align: top; border-right: 1.5px solid;"
                        >
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                Principal Name
                            </p>
                        </td>
                        <td
                                width="25%"
                                style="vertical-align: top; border-right: 1.5px solid;"
                        >
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                Telephone Number Of College
                            </p>
                        </td>
                        <td width="50%" style="vertical-align: top;">
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                College Email Address
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-right: 1.5px solid;">
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->principal_name}}
                            </p>
                        </td>
                        <td style="border-right: 1.5px solid;">
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->telephone_of_college}}
                            </p>
                        </td>
                        <td>
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->college_email}}
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <h1
            style="
          padding: 5px 0 3px;
          margin-top: 10px;
          text-transform: uppercase;
          font-size: 8px;
          font-weight: 600;
        "
    >
        References
    </h1>
    <p style="padding-bottom: 5px; font-size: 8px; font-weight: 400;">
        Please give your teacher or neighbor reference which are not your
        relatives
    </p>
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                12
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Name
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->teacher_name1}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                13
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Name
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->teacher_name2}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td
                                width="25%"
                                style="vertical-align: top; border-right: 1.5px solid;"
                        >
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                Cell No
                            </p>
                        </td>
                        <td
                                width="25%"
                                style="vertical-align: top; border-right: 1.5px solid;"
                        >
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                Address
                            </p>
                        </td>
                        <td
                                width="25%"
                                style="vertical-align: top; border-right: 1.5px solid;"
                        >
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                Cell No
                            </p>
                        </td>
                        <td width="25%" style="vertical-align: top;">
                            <p
                                    style="
                          padding: 5px 10px 0;
                          font-size: 8px;
                          font-weight: 400;
                        "
                            >
                                Address
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-right: 1.5px solid;">
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->teach_cell_no1}}
                            </p>
                        </td>
                        <td style="border-right: 1.5px solid;">
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->teacher_address1}}
                            </p>
                        </td>
                        <td style="border-right: 1.5px solid;">
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->teach_cell_no2}}
                            </p>
                        </td>
                        <td>
                            <p
                                    style="
                          padding: 5px 10px;
                          font-size: 8px;
                          font-weight: 500;
                        "
                            >
                                {{$apply->teacher_address2}}
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                14
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        How many family members do you have?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <p
                                    style="
                          padding: 5px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 30px;
                            text-align: center;
                            border-bottom: 1.5px solid;
                            font-size: 10px;
                            height: 12px;
                          "
                        >
                          {{$apply->family_members}}
                        </span>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                15
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        How much monthly income?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <p
                                    style="
                          padding: 5px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 80px;
                            text-align: center;
                            border-bottom: 1.5px solid;
                            font-size: 10px;
                            height: 12px;
                          "
                        >
                          {{$apply->monthly_income}}
                        </span>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                16
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        How much sqr yards of your home/flat?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->home_in_sqr_yards}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                17
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        What is source of income of your father/guardian?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->source_of_income}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                18
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Student CNIC Number / Form 'B'
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->cnic_number}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                19
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Student Mobile Number
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->mobile_number}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                20
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Student WhatsApp Number
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->whatsapp_number}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          margin-right: 5px;
                          font-size: 7px;
                        "
                            >
                                21
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);">
                      <span
                              style="
                          margin-left: 0px;
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Student Email Address
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->email_address}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                22
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Have you ever received any scholarships?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="9%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: flex;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >{{$apply->any_scholarship == "yes" ? '✓' : ''}}</span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          Yes
                        </span>
                            </p>
                        </td>
                        <td width="40%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: flex;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >
                         {{$apply->any_scholarship == "no" ? 'X' : ''}}
                        </span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          No
                        </span>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                23
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        What role you will play for Dalda Foundation Community ?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->your_contribution}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                24
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="4">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                          margin-left: -5px;
                        "
                      >
                        Short & Long Term Goals and how you will pay back/serve
                        Dalda Foundation after completing your degree ?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->goals}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                25
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                          margin-left: -5px;
                        "
                      >
                        Your Suggestions, how we together can develop Dalda
                        Foundation Community to serve mankind ?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->suggestion}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                26
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                          margin-left: -5px;
                        "
                      >
                        Are you interested in achieving international
                        scholarships with the help of Dalda Foundation Trust?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="9%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: inline-block;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >{{$apply->international_scolarship == "yes" ? '✓' : ''}}
                        </span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          Yes
                        </span>
                            </p>
                        </td>
                        <td width="40%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: inline-block;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >
{{$apply->international_scolarship == "no" ? '✓' : ''}}
                        </span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          No
                        </span>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="100%" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                27
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                          margin-left: -5px;
                        "
                      >
                        Are you ready to take English ability test such as
                        IELTS/TOEFL/PTE/PVT/ITEP/DUOLINGO ?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="9%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: inline-block;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >
                        {{$apply->international_scolarship == "yes" ? '✓' : ''}}
                        </span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          Yes
                        </span>
                            </p>
                        </td>
                        <td width="40%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: inline-block;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >
                            {{$apply->international_scolarship == "no" ? '✓' : ''}}
                        </span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          No
                        </span>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                28
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Are you ready to take standardized tests such as
                        GRE/GMAT/LSAT ?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="9%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: inline-block;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >
                        {{$apply->international_scolarship == "yes" ? '✓' : ''}}
                        </span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          Yes
                        </span>
                            </p>
                        </td>
                        <td width="40%">
                            <p
                                    style="
                          padding: 5px 10px;
                          display: flex;
                          align-items: center;
                        "
                            >
                        <span
                                style="
                            width: 8px;
                            height: 8px;
                            border: 1.5px solid;
                            display: inline-block;
                            text-align: center;
                            font-size: 6px;
                            line-height: 8px;
                          "
                        >{{$apply->international_scolarship == "no" ? '✓' : ''}}</span>
                                <span
                                        style="
                            font-size: 8px;
                            font-weight: 600;
                            padding-left: 5px;
                          "
                                >
                          No
                        </span>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10px">
                            <p
                                    style="
                          width: 10px;
                          display: block;
                          height: 10px;
                          text-align: center;
                          line-height: 10px;
                          border-right: 1.5px solid;
                          border-bottom: 1.5px solid;
                          font-weight: 600;
                          font-size: 7px;
                        "
                            >
                                29
                            </p>
                        </td>
                        <td style="width: calc(100% - 10px);" colspan="2">
                      <span
                              style="
                          display: block;
                          font-size: 8px;
                          font-weight: 600;
                        "
                      >
                        Anything you want to share with Dalda Foundation Trust ?
                      </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label
                                    style="
                          margin-left: 0px;
                          font-size: 8px;
                          display: block;
                          font-weight: 400;
                        "
                            >
                                {{$apply->share_any}}
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <div style="margin: 10px 0;">
        <p style="font-size: 7px; font-weight: 500; text-align: left;padding-bottom: 5px;">
            Student Photo and Documents
        </p>
        @if(file_exists(public_path('storage/uploads/'.$apply->student_photo)))
            <img src="{{public_path('storage/uploads/'.$apply->student_photo ?? '')}}"
                 style="width: 80px; height: 80px; object-fit: contain;">
            <br/>
        @endif
        @if(!in_array('pdf', explode('.', $apply->marksheet_photo)) && is_file(public_path('storage/uploads/'.$apply->marksheet_photo)) && file_exists(public_path('storage/uploads/'.$apply->marksheet_photo)))
            <img src="{{public_path('storage/uploads/'.$apply->marksheet_photo ?? '')}}" style="width: 600px; height: 600px; object-fit: contain;"/>
            <br/>
        @endif
        @if(!in_array('pdf', explode('.', $apply->beneficary_cnic_photo)) && is_file(public_path('storage/uploads/'.$apply->beneficary_cnic_photo)) && file_exists(public_path('storage/uploads/'.$apply->beneficary_cnic_photo)))
            <img src="{{public_path('storage/uploads/'.$apply->beneficary_cnic_photo ?? '')}}" style="width: 600px; height: 600px; object-fit: contain;"/>
            <br/>
        @endif
        @if(!in_array('pdf', explode('.', $apply->parent_cnic_photo)) && is_file(public_path('storage/uploads/'.$apply->parent_cnic_photo)) && file_exists(public_path('storage/uploads/'.$apply->parent_cnic_photo)))
            <img src="{{public_path('storage/uploads/'.$apply->parent_cnic_photo ?? '')}}" style="width: 600px; height: 600px; object-fit: contain;"/>
            <br/>
        @endif
    </div>
</div>
</body>
</html>
