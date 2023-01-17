<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */

        /*All the styling goes here*/

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }

        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */

        .body {
            background-color: #f6f6f6;
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            min-width: 200px;
            max-width: 580px;
            padding: 10px;
        }

        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .header {
            box-sizing: border-box;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 16px 10px;
            background-color: #f6f6f6;
        }

        .header .logo {
            height: 3rem;
            width: auto;
        }

        .footer {
            box-sizing: border-box;
            width: 100% !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 32px 10px !important;
            color: white;
            font-size: 10px;
            background-color: #282a36;
        }

        .footer .description {
            font-size: 14px;
            margin-bottom: 20px;
            font-weight: 700;
            color: white;
        }

        .footer .address {
            font-size: 12px;
            margin-bottom: 20px;
            color: white;
        }

        .footer .contact p {
            font-size: 12px;
            text-align: center;
            margin: 0;
            color: white;
        }

        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 20px;
        }

        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize;
        }

        a {
            color: #3498db;
            text-decoration: underline;
        }

        p {
            margin: 0;
            padding: 0;
        }

        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */

        hr {
            border: 0;
            border-bottom: 1px solid #d4d4d4;
            margin: 20px 0;
        }

        .order-note {
            text-align: center;
            padding: 1rem 0;
        }

        .order-note p {
            margin: 0;
        }

        .order-item {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 1rem;
            padding: 1rem;
            border-color: rgb(209 213 219);
            margin-bottom: 1rem;
            border-bottom: 1px solid #d4d4d4;
        }

        .order-item:last-child {
            border-bottom: 0;
        }

        .order-item .image-preview {
            grid-column: span 4 / span 4;
            text-align: right;
        }

        .order-item .books-meta-preview {
            grid-column: span 8 / span 8;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: stretch;
        }

        .image-preview img {
            width: 8rem;
            height: auto;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            border-color: rgb(229 231 235);
            border-radius: 0.25rem;
        }

        .books-meta-preview .meta {
            margin-bottom: 0.5rem;
        }

        .books-meta-preview .qty {
            font-size: 0.875rem;
            line-height: 1.25rem;
            padding-bottom: 4px;
        }

        .meta h4 {
            font-size: 1rem;
            line-height: 1.5rem;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .meta h6 {
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-style: italic;
            margin: 0 0 0.25rem 0;
            font-weight: 400;
        }

        .subtotal {
            width: 100%;
            margin: 20px 0;
            font-weight: 700;
            text-align: right;
        }

        .subtotal .content {
            border: 0;
            border-top: 1px solid #d4d4d4;
        }

        .subtotal .content p {
            text-align: right;
            padding: 10px 20px;
        }

        .content-center {
            display: flex;
            flex-direction: column;
            justify-items: start;
            align-items: center;
        }

        .font-bold {
            font-weight: 700;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>
<body>

{{ $slot }}

</body>
</html>

