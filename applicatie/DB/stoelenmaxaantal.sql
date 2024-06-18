SELECT
    p.vluchtnummer,
    COUNT(stoel) AS aantal_stoelen,
    v.max_aantal
FROM Passagier p
         JOIN Vlucht V on V.vluchtnummer = P.vluchtnummer
GROUP BY
    p.vluchtnummer,
    V.max_aantal
