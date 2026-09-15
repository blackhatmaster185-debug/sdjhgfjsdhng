<?php




define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));


define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

define('SYSDIR', basename(BASEPATH));

if (is_dir($appija_folder)) {
    if (($_temp = realpath($appija_folder)) !== FALSE) {
        $appija_folder = $_temp;
    } else {
        $appija_folder = strtr(
            rtrim($appija_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir(BASEPATH . $appija_folder . DIRECTORY_SEPARATOR)) {
    $appija_folder = BASEPATH . strtr(
        trim($appija_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}

define('APPIJPATH', $appija_folder . DIRECTORY_SEPARATOR);


if (is_dir($application_folder)) {
    if (($_temp = realpath($application_folder)) !== FALSE) {
        $application_folder = $_temp;
    } else {
        $application_folder = strtr(
            rtrim($application_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir(BASEPATH . $application_folder . DIRECTORY_SEPARATOR)) {
    $application_folder = BASEPATH . strtr(
        trim($application_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}

define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);

// The path to the "views" directory
if (!isset($view_folder[0]) && is_dir($tema_dizin_adi . DIRECTORY_SEPARATOR)) {
    $view_folder = $tema_dizin_adi;
} elseif (is_dir($view_folder)) {
    if (($_temp = realpath($view_folder)) !== FALSE) {
        $view_folder = $_temp;
    } else {
        $view_folder = strtr(
            rtrim($view_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir($view_folder . DIRECTORY_SEPARATOR)) {
    $view_folder = strtr(
        trim($view_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}
define('VIEWPATH', $view_folder . DIRECTORY_SEPARATOR);
