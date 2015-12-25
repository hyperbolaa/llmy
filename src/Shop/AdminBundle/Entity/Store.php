<?php

namespace Shop\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 * @ORM\Entity(repositoryClass="Shop\AdminBundle\Entity\StoreRepository")
 * @ORM\Table(name="store", indexes={@ORM\Index(name="store_name", columns={"store_name"}), @ORM\Index(name="sc_id", columns={"sc_id"}), @ORM\Index(name="area_id", columns={"area_id"}), @ORM\Index(name="store_state", columns={"store_state"})})
 */
class Store
{
    /**
     * @var string
     *
     * @ORM\Column(name="store_name", type="string", length=50, nullable=false)
     */
    private $storeName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="store_auth", type="boolean", nullable=true)
     */
    private $storeAuth = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="name_auth", type="boolean", nullable=true)
     */
    private $nameAuth = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="grade_id", type="integer", nullable=false)
     */
    private $gradeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=false)
     */
    private $memberId;

    /**
     * @var string
     *
     * @ORM\Column(name="member_name", type="string", length=50, nullable=false)
     */
    private $memberName;

    /**
     * @var string
     *
     * @ORM\Column(name="store_owner_card", type="string", length=50, nullable=false)
     */
    private $storeOwnerCard;

    /**
     * @var integer
     *
     * @ORM\Column(name="sc_id", type="integer", nullable=false)
     */
    private $scId;

    /**
     * @var integer
     *
     * @ORM\Column(name="area_id", type="integer", nullable=false)
     */
    private $areaId;

    /**
     * @var string
     *
     * @ORM\Column(name="area_info", type="string", length=100, nullable=false)
     */
    private $areaInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="store_address", type="string", length=100, nullable=false)
     */
    private $storeAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="store_zip", type="string", length=10, nullable=false)
     */
    private $storeZip;

    /**
     * @var string
     *
     * @ORM\Column(name="store_tel", type="string", length=50, nullable=false)
     */
    private $storeTel;

    /**
     * @var string
     *
     * @ORM\Column(name="store_image", type="string", length=100, nullable=true)
     */
    private $storeImage;

    /**
     * @var string
     *
     * @ORM\Column(name="store_image1", type="string", length=100, nullable=true)
     */
    private $storeImage1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="store_state", type="boolean", nullable=false)
     */
    private $storeState = '2';

    /**
     * @var string
     *
     * @ORM\Column(name="store_close_info", type="string", length=255, nullable=true)
     */
    private $storeCloseInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_sort", type="integer", nullable=false)
     */
    private $storeSort = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="store_time", type="string", length=10, nullable=false)
     */
    private $storeTime;

    /**
     * @var string
     *
     * @ORM\Column(name="store_end_time", type="string", length=10, nullable=true)
     */
    private $storeEndTime;

    /**
     * @var string
     *
     * @ORM\Column(name="store_label", type="string", length=255, nullable=true)
     */
    private $storeLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="store_banner", type="string", length=255, nullable=true)
     */
    private $storeBanner;

    /**
     * @var string
     *
     * @ORM\Column(name="store_logo", type="string", length=255, nullable=true)
     */
    private $storeLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="store_keywords", type="string", length=255, nullable=false)
     */
    private $storeKeywords = '';

    /**
     * @var string
     *
     * @ORM\Column(name="store_description", type="string", length=255, nullable=false)
     */
    private $storeDescription = '';

    /**
     * @var string
     *
     * @ORM\Column(name="store_qq", type="string", length=50, nullable=true)
     */
    private $storeQq;

    /**
     * @var string
     *
     * @ORM\Column(name="store_ww", type="string", length=50, nullable=true)
     */
    private $storeWw;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="store_zy", type="text", length=65535, nullable=true)
     */
    private $storeZy;

    /**
     * @var string
     *
     * @ORM\Column(name="store_domain", type="string", length=50, nullable=true)
     */
    private $storeDomain;

    /**
     * @var boolean
     *
     * @ORM\Column(name="store_domain_times", type="boolean", nullable=true)
     */
    private $storeDomainTimes = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="store_recommend", type="boolean", nullable=false)
     */
    private $storeRecommend = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="store_theme", type="string", length=50, nullable=false)
     */
    private $storeTheme = 'default';

    /**
     * @var integer
     *
     * @ORM\Column(name="store_credit", type="integer", nullable=false)
     */
    private $storeCredit = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="praise_rate", type="float", precision=10, scale=0, nullable=false)
     */
    private $praiseRate = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="store_desccredit", type="float", precision=10, scale=0, nullable=false)
     */
    private $storeDesccredit = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="store_servicecredit", type="float", precision=10, scale=0, nullable=false)
     */
    private $storeServicecredit = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="store_deliverycredit", type="float", precision=10, scale=0, nullable=false)
     */
    private $storeDeliverycredit = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="store_code", type="string", length=255, nullable=false)
     */
    private $storeCode = 'default_qrcode.png';

    /**
     * @var integer
     *
     * @ORM\Column(name="store_collect", type="integer", nullable=false)
     */
    private $storeCollect = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="store_slide", type="text", length=65535, nullable=true)
     */
    private $storeSlide;

    /**
     * @var string
     *
     * @ORM\Column(name="store_slide_url", type="text", length=65535, nullable=true)
     */
    private $storeSlideUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="store_center_quicklink", type="text", length=65535, nullable=true)
     */
    private $storeCenterQuicklink;

    /**
     * @var string
     *
     * @ORM\Column(name="store_stamp", type="string", length=200, nullable=true)
     */
    private $storeStamp;

    /**
     * @var string
     *
     * @ORM\Column(name="store_printdesc", type="string", length=500, nullable=true)
     */
    private $storePrintdesc;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_sales", type="integer", nullable=false)
     */
    private $storeSales = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="store_presales", type="text", length=65535, nullable=true)
     */
    private $storePresales;

    /**
     * @var string
     *
     * @ORM\Column(name="store_aftersales", type="text", length=65535, nullable=true)
     */
    private $storeAftersales;

    /**
     * @var string
     *
     * @ORM\Column(name="store_workingtime", type="string", length=100, nullable=true)
     */
    private $storeWorkingtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $storeId;



    /**
     * Set storeName
     *
     * @param string $storeName
     *
     * @return Store
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;

        return $this;
    }

    /**
     * Get storeName
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * Set storeAuth
     *
     * @param boolean $storeAuth
     *
     * @return Store
     */
    public function setStoreAuth($storeAuth)
    {
        $this->storeAuth = $storeAuth;

        return $this;
    }

    /**
     * Get storeAuth
     *
     * @return boolean
     */
    public function getStoreAuth()
    {
        return $this->storeAuth;
    }

    /**
     * Set nameAuth
     *
     * @param boolean $nameAuth
     *
     * @return Store
     */
    public function setNameAuth($nameAuth)
    {
        $this->nameAuth = $nameAuth;

        return $this;
    }

    /**
     * Get nameAuth
     *
     * @return boolean
     */
    public function getNameAuth()
    {
        return $this->nameAuth;
    }

    /**
     * Set gradeId
     *
     * @param integer $gradeId
     *
     * @return Store
     */
    public function setGradeId($gradeId)
    {
        $this->gradeId = $gradeId;

        return $this;
    }

    /**
     * Get gradeId
     *
     * @return integer
     */
    public function getGradeId()
    {
        return $this->gradeId;
    }

    /**
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return Store
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * Get memberId
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set memberName
     *
     * @param string $memberName
     *
     * @return Store
     */
    public function setMemberName($memberName)
    {
        $this->memberName = $memberName;

        return $this;
    }

    /**
     * Get memberName
     *
     * @return string
     */
    public function getMemberName()
    {
        return $this->memberName;
    }

    /**
     * Set storeOwnerCard
     *
     * @param string $storeOwnerCard
     *
     * @return Store
     */
    public function setStoreOwnerCard($storeOwnerCard)
    {
        $this->storeOwnerCard = $storeOwnerCard;

        return $this;
    }

    /**
     * Get storeOwnerCard
     *
     * @return string
     */
    public function getStoreOwnerCard()
    {
        return $this->storeOwnerCard;
    }

    /**
     * Set scId
     *
     * @param integer $scId
     *
     * @return Store
     */
    public function setScId($scId)
    {
        $this->scId = $scId;

        return $this;
    }

    /**
     * Get scId
     *
     * @return integer
     */
    public function getScId()
    {
        return $this->scId;
    }

    /**
     * Set areaId
     *
     * @param integer $areaId
     *
     * @return Store
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;

        return $this;
    }

    /**
     * Get areaId
     *
     * @return integer
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * Set areaInfo
     *
     * @param string $areaInfo
     *
     * @return Store
     */
    public function setAreaInfo($areaInfo)
    {
        $this->areaInfo = $areaInfo;

        return $this;
    }

    /**
     * Get areaInfo
     *
     * @return string
     */
    public function getAreaInfo()
    {
        return $this->areaInfo;
    }

    /**
     * Set storeAddress
     *
     * @param string $storeAddress
     *
     * @return Store
     */
    public function setStoreAddress($storeAddress)
    {
        $this->storeAddress = $storeAddress;

        return $this;
    }

    /**
     * Get storeAddress
     *
     * @return string
     */
    public function getStoreAddress()
    {
        return $this->storeAddress;
    }

    /**
     * Set storeZip
     *
     * @param string $storeZip
     *
     * @return Store
     */
    public function setStoreZip($storeZip)
    {
        $this->storeZip = $storeZip;

        return $this;
    }

    /**
     * Get storeZip
     *
     * @return string
     */
    public function getStoreZip()
    {
        return $this->storeZip;
    }

    /**
     * Set storeTel
     *
     * @param string $storeTel
     *
     * @return Store
     */
    public function setStoreTel($storeTel)
    {
        $this->storeTel = $storeTel;

        return $this;
    }

    /**
     * Get storeTel
     *
     * @return string
     */
    public function getStoreTel()
    {
        return $this->storeTel;
    }

    /**
     * Set storeImage
     *
     * @param string $storeImage
     *
     * @return Store
     */
    public function setStoreImage($storeImage)
    {
        $this->storeImage = $storeImage;

        return $this;
    }

    /**
     * Get storeImage
     *
     * @return string
     */
    public function getStoreImage()
    {
        return $this->storeImage;
    }

    /**
     * Set storeImage1
     *
     * @param string $storeImage1
     *
     * @return Store
     */
    public function setStoreImage1($storeImage1)
    {
        $this->storeImage1 = $storeImage1;

        return $this;
    }

    /**
     * Get storeImage1
     *
     * @return string
     */
    public function getStoreImage1()
    {
        return $this->storeImage1;
    }

    /**
     * Set storeState
     *
     * @param boolean $storeState
     *
     * @return Store
     */
    public function setStoreState($storeState)
    {
        $this->storeState = $storeState;

        return $this;
    }

    /**
     * Get storeState
     *
     * @return boolean
     */
    public function getStoreState()
    {
        return $this->storeState;
    }

    /**
     * Set storeCloseInfo
     *
     * @param string $storeCloseInfo
     *
     * @return Store
     */
    public function setStoreCloseInfo($storeCloseInfo)
    {
        $this->storeCloseInfo = $storeCloseInfo;

        return $this;
    }

    /**
     * Get storeCloseInfo
     *
     * @return string
     */
    public function getStoreCloseInfo()
    {
        return $this->storeCloseInfo;
    }

    /**
     * Set storeSort
     *
     * @param integer $storeSort
     *
     * @return Store
     */
    public function setStoreSort($storeSort)
    {
        $this->storeSort = $storeSort;

        return $this;
    }

    /**
     * Get storeSort
     *
     * @return integer
     */
    public function getStoreSort()
    {
        return $this->storeSort;
    }

    /**
     * Set storeTime
     *
     * @param string $storeTime
     *
     * @return Store
     */
    public function setStoreTime($storeTime)
    {
        $this->storeTime = $storeTime;

        return $this;
    }

    /**
     * Get storeTime
     *
     * @return string
     */
    public function getStoreTime()
    {
        return $this->storeTime;
    }

    /**
     * Set storeEndTime
     *
     * @param string $storeEndTime
     *
     * @return Store
     */
    public function setStoreEndTime($storeEndTime)
    {
        $this->storeEndTime = $storeEndTime;

        return $this;
    }

    /**
     * Get storeEndTime
     *
     * @return string
     */
    public function getStoreEndTime()
    {
        return $this->storeEndTime;
    }

    /**
     * Set storeLabel
     *
     * @param string $storeLabel
     *
     * @return Store
     */
    public function setStoreLabel($storeLabel)
    {
        $this->storeLabel = $storeLabel;

        return $this;
    }

    /**
     * Get storeLabel
     *
     * @return string
     */
    public function getStoreLabel()
    {
        return $this->storeLabel;
    }

    /**
     * Set storeBanner
     *
     * @param string $storeBanner
     *
     * @return Store
     */
    public function setStoreBanner($storeBanner)
    {
        $this->storeBanner = $storeBanner;

        return $this;
    }

    /**
     * Get storeBanner
     *
     * @return string
     */
    public function getStoreBanner()
    {
        return $this->storeBanner;
    }

    /**
     * Set storeLogo
     *
     * @param string $storeLogo
     *
     * @return Store
     */
    public function setStoreLogo($storeLogo)
    {
        $this->storeLogo = $storeLogo;

        return $this;
    }

    /**
     * Get storeLogo
     *
     * @return string
     */
    public function getStoreLogo()
    {
        return $this->storeLogo;
    }

    /**
     * Set storeKeywords
     *
     * @param string $storeKeywords
     *
     * @return Store
     */
    public function setStoreKeywords($storeKeywords)
    {
        $this->storeKeywords = $storeKeywords;

        return $this;
    }

    /**
     * Get storeKeywords
     *
     * @return string
     */
    public function getStoreKeywords()
    {
        return $this->storeKeywords;
    }

    /**
     * Set storeDescription
     *
     * @param string $storeDescription
     *
     * @return Store
     */
    public function setStoreDescription($storeDescription)
    {
        $this->storeDescription = $storeDescription;

        return $this;
    }

    /**
     * Get storeDescription
     *
     * @return string
     */
    public function getStoreDescription()
    {
        return $this->storeDescription;
    }

    /**
     * Set storeQq
     *
     * @param string $storeQq
     *
     * @return Store
     */
    public function setStoreQq($storeQq)
    {
        $this->storeQq = $storeQq;

        return $this;
    }

    /**
     * Get storeQq
     *
     * @return string
     */
    public function getStoreQq()
    {
        return $this->storeQq;
    }

    /**
     * Set storeWw
     *
     * @param string $storeWw
     *
     * @return Store
     */
    public function setStoreWw($storeWw)
    {
        $this->storeWw = $storeWw;

        return $this;
    }

    /**
     * Get storeWw
     *
     * @return string
     */
    public function getStoreWw()
    {
        return $this->storeWw;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Store
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set storeZy
     *
     * @param string $storeZy
     *
     * @return Store
     */
    public function setStoreZy($storeZy)
    {
        $this->storeZy = $storeZy;

        return $this;
    }

    /**
     * Get storeZy
     *
     * @return string
     */
    public function getStoreZy()
    {
        return $this->storeZy;
    }

    /**
     * Set storeDomain
     *
     * @param string $storeDomain
     *
     * @return Store
     */
    public function setStoreDomain($storeDomain)
    {
        $this->storeDomain = $storeDomain;

        return $this;
    }

    /**
     * Get storeDomain
     *
     * @return string
     */
    public function getStoreDomain()
    {
        return $this->storeDomain;
    }

    /**
     * Set storeDomainTimes
     *
     * @param boolean $storeDomainTimes
     *
     * @return Store
     */
    public function setStoreDomainTimes($storeDomainTimes)
    {
        $this->storeDomainTimes = $storeDomainTimes;

        return $this;
    }

    /**
     * Get storeDomainTimes
     *
     * @return boolean
     */
    public function getStoreDomainTimes()
    {
        return $this->storeDomainTimes;
    }

    /**
     * Set storeRecommend
     *
     * @param boolean $storeRecommend
     *
     * @return Store
     */
    public function setStoreRecommend($storeRecommend)
    {
        $this->storeRecommend = $storeRecommend;

        return $this;
    }

    /**
     * Get storeRecommend
     *
     * @return boolean
     */
    public function getStoreRecommend()
    {
        return $this->storeRecommend;
    }

    /**
     * Set storeTheme
     *
     * @param string $storeTheme
     *
     * @return Store
     */
    public function setStoreTheme($storeTheme)
    {
        $this->storeTheme = $storeTheme;

        return $this;
    }

    /**
     * Get storeTheme
     *
     * @return string
     */
    public function getStoreTheme()
    {
        return $this->storeTheme;
    }

    /**
     * Set storeCredit
     *
     * @param integer $storeCredit
     *
     * @return Store
     */
    public function setStoreCredit($storeCredit)
    {
        $this->storeCredit = $storeCredit;

        return $this;
    }

    /**
     * Get storeCredit
     *
     * @return integer
     */
    public function getStoreCredit()
    {
        return $this->storeCredit;
    }

    /**
     * Set praiseRate
     *
     * @param float $praiseRate
     *
     * @return Store
     */
    public function setPraiseRate($praiseRate)
    {
        $this->praiseRate = $praiseRate;

        return $this;
    }

    /**
     * Get praiseRate
     *
     * @return float
     */
    public function getPraiseRate()
    {
        return $this->praiseRate;
    }

    /**
     * Set storeDesccredit
     *
     * @param float $storeDesccredit
     *
     * @return Store
     */
    public function setStoreDesccredit($storeDesccredit)
    {
        $this->storeDesccredit = $storeDesccredit;

        return $this;
    }

    /**
     * Get storeDesccredit
     *
     * @return float
     */
    public function getStoreDesccredit()
    {
        return $this->storeDesccredit;
    }

    /**
     * Set storeServicecredit
     *
     * @param float $storeServicecredit
     *
     * @return Store
     */
    public function setStoreServicecredit($storeServicecredit)
    {
        $this->storeServicecredit = $storeServicecredit;

        return $this;
    }

    /**
     * Get storeServicecredit
     *
     * @return float
     */
    public function getStoreServicecredit()
    {
        return $this->storeServicecredit;
    }

    /**
     * Set storeDeliverycredit
     *
     * @param float $storeDeliverycredit
     *
     * @return Store
     */
    public function setStoreDeliverycredit($storeDeliverycredit)
    {
        $this->storeDeliverycredit = $storeDeliverycredit;

        return $this;
    }

    /**
     * Get storeDeliverycredit
     *
     * @return float
     */
    public function getStoreDeliverycredit()
    {
        return $this->storeDeliverycredit;
    }

    /**
     * Set storeCode
     *
     * @param string $storeCode
     *
     * @return Store
     */
    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;

        return $this;
    }

    /**
     * Get storeCode
     *
     * @return string
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * Set storeCollect
     *
     * @param integer $storeCollect
     *
     * @return Store
     */
    public function setStoreCollect($storeCollect)
    {
        $this->storeCollect = $storeCollect;

        return $this;
    }

    /**
     * Get storeCollect
     *
     * @return integer
     */
    public function getStoreCollect()
    {
        return $this->storeCollect;
    }

    /**
     * Set storeSlide
     *
     * @param string $storeSlide
     *
     * @return Store
     */
    public function setStoreSlide($storeSlide)
    {
        $this->storeSlide = $storeSlide;

        return $this;
    }

    /**
     * Get storeSlide
     *
     * @return string
     */
    public function getStoreSlide()
    {
        return $this->storeSlide;
    }

    /**
     * Set storeSlideUrl
     *
     * @param string $storeSlideUrl
     *
     * @return Store
     */
    public function setStoreSlideUrl($storeSlideUrl)
    {
        $this->storeSlideUrl = $storeSlideUrl;

        return $this;
    }

    /**
     * Get storeSlideUrl
     *
     * @return string
     */
    public function getStoreSlideUrl()
    {
        return $this->storeSlideUrl;
    }

    /**
     * Set storeCenterQuicklink
     *
     * @param string $storeCenterQuicklink
     *
     * @return Store
     */
    public function setStoreCenterQuicklink($storeCenterQuicklink)
    {
        $this->storeCenterQuicklink = $storeCenterQuicklink;

        return $this;
    }

    /**
     * Get storeCenterQuicklink
     *
     * @return string
     */
    public function getStoreCenterQuicklink()
    {
        return $this->storeCenterQuicklink;
    }

    /**
     * Set storeStamp
     *
     * @param string $storeStamp
     *
     * @return Store
     */
    public function setStoreStamp($storeStamp)
    {
        $this->storeStamp = $storeStamp;

        return $this;
    }

    /**
     * Get storeStamp
     *
     * @return string
     */
    public function getStoreStamp()
    {
        return $this->storeStamp;
    }

    /**
     * Set storePrintdesc
     *
     * @param string $storePrintdesc
     *
     * @return Store
     */
    public function setStorePrintdesc($storePrintdesc)
    {
        $this->storePrintdesc = $storePrintdesc;

        return $this;
    }

    /**
     * Get storePrintdesc
     *
     * @return string
     */
    public function getStorePrintdesc()
    {
        return $this->storePrintdesc;
    }

    /**
     * Set storeSales
     *
     * @param integer $storeSales
     *
     * @return Store
     */
    public function setStoreSales($storeSales)
    {
        $this->storeSales = $storeSales;

        return $this;
    }

    /**
     * Get storeSales
     *
     * @return integer
     */
    public function getStoreSales()
    {
        return $this->storeSales;
    }

    /**
     * Set storePresales
     *
     * @param string $storePresales
     *
     * @return Store
     */
    public function setStorePresales($storePresales)
    {
        $this->storePresales = $storePresales;

        return $this;
    }

    /**
     * Get storePresales
     *
     * @return string
     */
    public function getStorePresales()
    {
        return $this->storePresales;
    }

    /**
     * Set storeAftersales
     *
     * @param string $storeAftersales
     *
     * @return Store
     */
    public function setStoreAftersales($storeAftersales)
    {
        $this->storeAftersales = $storeAftersales;

        return $this;
    }

    /**
     * Get storeAftersales
     *
     * @return string
     */
    public function getStoreAftersales()
    {
        return $this->storeAftersales;
    }

    /**
     * Set storeWorkingtime
     *
     * @param string $storeWorkingtime
     *
     * @return Store
     */
    public function setStoreWorkingtime($storeWorkingtime)
    {
        $this->storeWorkingtime = $storeWorkingtime;

        return $this;
    }

    /**
     * Get storeWorkingtime
     *
     * @return string
     */
    public function getStoreWorkingtime()
    {
        return $this->storeWorkingtime;
    }

    /**
     * Get storeId
     *
     * @return integer
     */
    public function getStoreId()
    {
        return $this->storeId;
    }
}
