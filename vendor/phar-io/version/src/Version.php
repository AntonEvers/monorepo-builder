<?php

declare (strict_types=1);
/*
 * This file is part of PharIo\Version.
 *
 * (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20210707\PharIo\Version;

class Version
{
    /** @var string */
    private $originalVersionString;
    /** @var VersionNumber */
    private $major;
    /** @var VersionNumber */
    private $minor;
    /** @var VersionNumber */
    private $patch;
    /** @var null|PreReleaseSuffix */
    private $preReleaseSuffix;
    public function __construct(string $versionString)
    {
        $this->ensureVersionStringIsValid($versionString);
        $this->originalVersionString = $versionString;
    }
    public function getPreReleaseSuffix() : \MonorepoBuilder20210707\PharIo\Version\PreReleaseSuffix
    {
        if ($this->preReleaseSuffix === null) {
            throw new \MonorepoBuilder20210707\PharIo\Version\NoPreReleaseSuffixException('No pre-release suffix set');
        }
        return $this->preReleaseSuffix;
    }
    public function getOriginalString() : string
    {
        return $this->originalVersionString;
    }
    public function getVersionString() : string
    {
        $str = \sprintf('%d.%d.%d', $this->getMajor()->getValue() ?? 0, $this->getMinor()->getValue() ?? 0, $this->getPatch()->getValue() ?? 0);
        if (!$this->hasPreReleaseSuffix()) {
            return $str;
        }
        return $str . '-' . $this->getPreReleaseSuffix()->asString();
    }
    public function hasPreReleaseSuffix() : bool
    {
        return $this->preReleaseSuffix !== null;
    }
    public function equals(\MonorepoBuilder20210707\PharIo\Version\Version $other) : bool
    {
        return $this->getVersionString() === $other->getVersionString();
    }
    public function isGreaterThan(\MonorepoBuilder20210707\PharIo\Version\Version $version) : bool
    {
        if ($version->getMajor()->getValue() > $this->getMajor()->getValue()) {
            return \false;
        }
        if ($version->getMajor()->getValue() < $this->getMajor()->getValue()) {
            return \true;
        }
        if ($version->getMinor()->getValue() > $this->getMinor()->getValue()) {
            return \false;
        }
        if ($version->getMinor()->getValue() < $this->getMinor()->getValue()) {
            return \true;
        }
        if ($version->getPatch()->getValue() > $this->getPatch()->getValue()) {
            return \false;
        }
        if ($version->getPatch()->getValue() < $this->getPatch()->getValue()) {
            return \true;
        }
        if (!$version->hasPreReleaseSuffix() && !$this->hasPreReleaseSuffix()) {
            return \false;
        }
        if ($version->hasPreReleaseSuffix() && !$this->hasPreReleaseSuffix()) {
            return \true;
        }
        if (!$version->hasPreReleaseSuffix() && $this->hasPreReleaseSuffix()) {
            return \false;
        }
        return $this->getPreReleaseSuffix()->isGreaterThan($version->getPreReleaseSuffix());
    }
    public function getMajor() : \MonorepoBuilder20210707\PharIo\Version\VersionNumber
    {
        return $this->major;
    }
    public function getMinor() : \MonorepoBuilder20210707\PharIo\Version\VersionNumber
    {
        return $this->minor;
    }
    public function getPatch() : \MonorepoBuilder20210707\PharIo\Version\VersionNumber
    {
        return $this->patch;
    }
    /**
     * @param string[] $matches
     *
     * @throws InvalidPreReleaseSuffixException
     */
    private function parseVersion(array $matches) : void
    {
        $this->major = new \MonorepoBuilder20210707\PharIo\Version\VersionNumber((int) $matches['Major']);
        $this->minor = new \MonorepoBuilder20210707\PharIo\Version\VersionNumber((int) $matches['Minor']);
        $this->patch = isset($matches['Patch']) ? new \MonorepoBuilder20210707\PharIo\Version\VersionNumber((int) $matches['Patch']) : new \MonorepoBuilder20210707\PharIo\Version\VersionNumber(0);
        if (isset($matches['PreReleaseSuffix'])) {
            $this->preReleaseSuffix = new \MonorepoBuilder20210707\PharIo\Version\PreReleaseSuffix($matches['PreReleaseSuffix']);
        }
    }
    /**
     * @param string $version
     *
     * @throws InvalidVersionException
     */
    private function ensureVersionStringIsValid($version) : void
    {
        $regex = '/^v?
            (?<Major>(0|(?:[1-9]\\d*)))
            \\.
            (?<Minor>(0|(?:[1-9]\\d*)))
            (\\.
                (?<Patch>(0|(?:[1-9]\\d*)))
            )?
            (?:
                -
                (?<PreReleaseSuffix>(?:(dev|beta|b|rc|alpha|a|patch|p)\\.?\\d*))
            )?       
        $/xi';
        if (\preg_match($regex, $version, $matches) !== 1) {
            throw new \MonorepoBuilder20210707\PharIo\Version\InvalidVersionException(\sprintf("Version string '%s' does not follow SemVer semantics", $version));
        }
        $this->parseVersion($matches);
    }
}
\class_alias('MonorepoBuilder20210707\\PharIo\\Version\\Version', 'PharIo\\Version\\Version', \false);
