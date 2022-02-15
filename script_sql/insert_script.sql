INSERT INTO `book` (
        `isbn`,
        `title`,
        `edition_year`,
        `language`,
        `resume_book`
    )
VALUES ('13', 'title ', '2006', 'EN', 'resume '),
    ('14', 'title 2', '1999', 'en', 'tregtgbhttrdt'),
    ('15', 'title ', '2006', 'EN', 'resume '),
    ('16', 'title ', '2006', 'EN', 'resume '),
    ('17', 'title ', '2006', 'EN', 'resume '),
    ('18', 'title ', '2006', 'EN', 'resume '),
    ('19', 'title ', '2006', 'EN', 'resume '),
    ('20', 'title ', '2006', 'EN', 'resume '),
    ('21', 'title ', '2006', 'EN', 'resume '),
    ('22', 'title ', '2006', 'EN', 'resume '),
    ('23', 'title ', '2006', 'EN', 'resume '),
    ('24', 'title ', '2006', 'EN', 'resume '),
    ('25', 'title ', '2006', 'EN', 'resume ');
INSERT INTO `library` (
        `id_users`,
        `isbn`,
        `buy_date`,
        `add_date`,
        `disponibility`,
        `id`
    )
VALUES ('2', '13', NULL, NULL, NULL, NULL),
    ('2', '15', NULL, NULL, NULL, NULL);