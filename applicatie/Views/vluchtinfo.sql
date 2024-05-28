CREATE VIEW vluchtinfo AS
SELECT
    Vlucht.vertrektijd,
    Vlucht.vluchtnummer,
    Luchthaven.naam AS luchthaven_naam,
    Luchthaven.land,
    Maatschappij.naam AS maatschappij_naam
FROM Vlucht
JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode
JOIN Maatschappij ON Vlucht.maatschappijcode = Maatschappij.maatschappijcode